<?php


Class Practice {

	function telnetToServer() {

		$server  = "10.100.102.3";
		$port    = "23";
		$timeout = "5";

		$connection = fsockopen($server, $port, $timeout);
		if ( ! $connection ) {
			return "Connection failed";
		}
		return "Connected";
	}

	function sshToServer() {

		$connection = ssh2_connect('shell.example.com', 22);
		ssh2_auth_password($connection, 'username', 'password');
		$sftp = ssh2_sftp($connection);

		if ( ! $sftp ) {
			return "Connection failed";
		}
		return "Connected";
	}

	function checkDiskUsage() {

		$bytes = disk_free_space(".");
		return round($bytes/1048576, 1)." MB";
	}

	function fileList() {
		return scandir("/var/www/html");
	}


}

$class = new Practice();

/******************************** 1 ********************************/

// 1 (a)
echo $class->telnetToServer();

// 1 (b)
echo $class->sshToServer();

// 1 (c)
echo $class->checkDiskUsage();

// 1 (e)
echo "<pre>";
print_r($class->fileList());
echo "</pre>";


/******************************** 2 ********************************/

ssh your_username@host_ip_address

mkdir folder
cd folder
touch file{1..4}.txt

cd .. && zip -r folder.zip folder 

scp username@hostname:/path/to/remote/folder.zip /path/to/local/folder.zip

cd /path/to/local/ && unzip folder.zip


/******************************** 3 ********************************/

httpd -k runservice


/******************************** 4 ********************************/

// 1 (a)
top (used to display system summary information and current utilization) 
or 
sar (used to collect a number of a report including CPU, Memory and device load)

// 1 (b)
ps aux --sort=-%mem | head
OR 
top then press m

// 1 (c)
uptime (check server load)
grep processor /proc/cpuinfo | wc -l (Get list of processes)
kill -9 PID (stop the running process)


/******************************** 5 ********************************/


CREATE VIEW myView AS SELECT  * FROM table_name;


/******************************** 6 ********************************/

INSERT INTO table_name (column_list)
VALUES
	(value_list_1),
	(value_list_2),
	...
	(value_list_n);
	
?>