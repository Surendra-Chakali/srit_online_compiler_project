<?php  
session_start();
include('db_connection.php');
error_reporting(0);
$username = $_SESSION['username'];
$qns_id = $_SESSION['qns_id'];
if (strlen($_SESSION['username']) == 0) {
    header('location: login.php');
 }
// getting sample output for test cases
	$opt = $_SESSION['output'];
	$qname = $_SESSION['qname'];

putenv("PATH=C:\Program Files (x86)\Dev-Cpp\MinGW64\bin");
$CC = "g++";
$out = "a.exe";
$code = $_POST["code"];
$input = $_POST["input"];
$filename_code = "main.cpp";
$filename_in = "input.txt";
$filename_error = "error.txt";
$executable = "a.exe";
$command = $CC." -lm ".$filename_code;
$command_error = $command." 2>".$filename_error;

$file_code = fopen($filename_code,"w+");
fwrite($file_code, $code);
fclose($file_code);
$file_in = fopen($filename_in,"w+");
fwrite($file_in, $input);
fclose($file_in);
exec("cacls $executable /g everyone:f");
exec("cacls $filename_error /g everyone:f");
shell_exec($command_error);
$error = file_get_contents($filename_error);

if(trim($error) == "")
{
	if(trim($input) == "")
	{
		$output = shell_exec($out);
	}
	else
	{
		$out = $out." < ".$filename_in;
		$output = shell_exec($out);
	}
	if ($opt == $output) {
		# code...
		echo "<script>alert('Test cases passed');</script>";
		echo "$opt";

		$sql1 = $conn->prepare("SELECT * FROM `student_registration` WHERE username = ?");
		$sql1->bind_param("s", $username);
		$sql1->execute();
	    $result = $sql1->get_result();
	    $row = $result->fetch_assoc();
	    $rollnumber = $row['std_id'];

	    $sql2 = $conn->prepare("SELECT * FROM `std_ans_qns` WHERE std_id = ? and qns_id = ?");
		$sql2->bind_param("ii", $rollnumber, $qns_id);
		$sql2->execute();
	    $result1 = $sql2->get_result();
	    $row1 = $result1->fetch_assoc();
	    $stdt_id = $row1['std_id'];

	    if ($stdt_id >= 1) {
	    	# code...
	    	echo "<script>alert('You are already done this question');</script>";
	    }
	    else
	    {
			$sql = $conn->prepare("INSERT INTO `std_ans_qns`(`std_id`, `qns_id`) VALUES (?, ?)");
			$sql->bind_param("ii", $rollnumber, $qns_id);
			$sql->execute();
		}
	}
	else{
		echo "<script>alert('Test cases not passed');</script>";
	 	echo "$output";
	}

	// echo "<p class='text-success'>$output</p>";
}
else if(!strpos($error, "error"))
{
	echo "$error";
	if(trim($input) == "")
	{
		$output = shell_exec($out);
	}
	else
	{
		$out = $out." < ".$filename_in;
		$output = shell_exec($out);
	}
	echo "$output";
}
else{
	echo "$error";
}
exec("del $filename_code");
exec("del *.o");
exec("del *.txt");
exec("del $executable");

?>
