-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2017 at 06:44 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serveradmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` int(10) NOT NULL,
  `server_name` varchar(200) NOT NULL,
  `server_ip` varchar(200) NOT NULL,
  `Protocol` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pass_expiry` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `role` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`id`, `server_name`, `server_ip`, `Protocol`, `username`, `password`, `pass_expiry`, `user_id`, `role`, `time`) VALUES
(2, 'impetus-1447', '192.168.41.130', 'ssh', 'hduser', 'hd@1234', '90', 1, 'admin', '2017-02-06 07:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `filemgmt`
--

CREATE TABLE `filemgmt` (
  `id` int(10) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_desc` varchar(2000) NOT NULL,
  `file_ext` varchar(100) NOT NULL,
  `file_type` varchar(100) NOT NULL,
  `full_path` varchar(100) NOT NULL,
  `file_size` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `role` varchar(50) NOT NULL,
  `uploaded_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `imp_cmds`
--

CREATE TABLE `imp_cmds` (
  `id` int(10) NOT NULL,
  `title` varchar(250) NOT NULL,
  `command` text NOT NULL,
  `description` longtext NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imp_cmds`
--

INSERT INTO `imp_cmds` (`id`, `title`, `command`, `description`, `username`, `user_id`, `role`, `Time`) VALUES
(1, 'xxxx', 'xxxx', 'xxxxxxxxxxx', 'admin', 1, 'admin', '2017-02-06 09:17:32'),
(2, 'aaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaa', 'admin', 1, 'admin', '2017-02-06 09:17:40');

-- --------------------------------------------------------

--
-- Table structure for table `imp_links`
--

CREATE TABLE `imp_links` (
  `id` int(10) NOT NULL,
  `title` varchar(250) NOT NULL,
  `link` text NOT NULL,
  `description` longtext NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imp_links`
--

INSERT INTO `imp_links` (`id`, `title`, `link`, `description`, `username`, `user_id`, `role`, `Time`) VALUES
(1, 'sasas', 'sasasas', 'sasasasas', NULL, NULL, NULL, '2017-02-06 09:15:30'),
(2, 'ssssssssss', 'ssssssssssssss', 'sssssssssssss', NULL, NULL, NULL, '2017-02-06 09:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `imp_scripts`
--

CREATE TABLE `imp_scripts` (
  `id` int(10) NOT NULL,
  `title` varchar(250) NOT NULL,
  `script` longtext NOT NULL,
  `description` longtext NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imp_scripts`
--

INSERT INTO `imp_scripts` (`id`, `title`, `script`, `description`, `username`, `user_id`, `role`, `Time`) VALUES
(3, 'Cluster.sh - Ambari Prerequisites script Part2', '#!/bin/bash\r\n\r\n#Prerequites Setup\r\n\r\n################### - Sourcing Variable defined in Hosts.sh\r\n\r\nsource ./hosts.sh\r\n\r\n##################################################################################\r\n\r\n\r\n################### -Checking sshpass is installed or not. If not installed then Installing SSHPASS for ssh connection without typing Password.\r\n\r\necho "Checking sshpass is installed or not "\r\n\r\nstatus=`sudo rpm -qa|grep sshpass|wc -l`\r\n\r\n\r\nif [[ $status -eq 0 ]]\r\nthen\r\necho "Installing SSHPASS"\r\nsudo rpm -ivh sshpass-1.05-1.el6.x86_64.rpm\r\nelse\r\necho "SSHPASS already installed"\r\nfi\r\n\r\n#####################################################################################\r\n\r\n\r\n################### Generating SSH Key if not Exit\r\n\r\nif [[ -f ~/.ssh/id_rsa && ~/.ssh/id_rsa.pub ]];then\r\n\r\necho "SSH Key Exist already | Copying to all hosts"\r\n\r\nelse\r\necho "Creating ssh Key"\r\n`echo -e  ''y\\n''|ssh-keygen -q -t rsa -N "" -f ~/.ssh/id_rsa`\r\nfi\r\n\r\n#####################################################################################\r\n\r\n\r\n################### Starting Passwordless SSH Process\r\n\r\necho "Setting up Password Less ssh..........."\r\n\r\nfor (( i=0; i<${#hostip[@]}; i++ ))\r\ndo\r\necho "SSH setup for ${hostip[$i]} (${host_name[$i]})"\r\n\r\nif [[ ${#username[@]} -gt 1 ]];then\r\npass="${password[$i]}"\r\nuser="${username[$i]}"\r\nelse\r\npass="${password[0]}"\r\nuser="${username[0]}"\r\nfi\r\n\r\n\r\n`sshpass -p $pass ssh   -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no  "$user"@"${hostip[$i]}" "mkdir .ssh"`\r\n\r\n`sshpass -p $pass ssh  -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no  "$user"@"${hostip[$i]}" "chmod 700 .ssh"`\r\n\r\n`sshpass -p $pass scp   -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no ~/.ssh/id_rsa.pub  "$user"@"${hostip[$i]}":./.ssh/authorized_keys`\r\n\r\n`sshpass -p $pass ssh  -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no   "$user"@"${hostip[$i]}" " chmod 600 .ssh/authorized_keys"`\r\n\r\n####################################################################################\r\n\r\n\r\n################### Download Java if archive is not Exist\r\n\r\nif [[ ! -f ./$javaarchive ]];then\r\n`wget $javaurl`\r\nfi\r\n\r\n\r\n\r\n`scp -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null ./$javaarchive "$user"@"${hostip[$i]}":./`\r\n\r\nssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null -tt "$user"@"${hostip[$i]}" <<eof\r\nsudo service iptables stop\r\nsudo  chkconfig iptables off\r\nsudo tar -zxf "$javaarchive" -C /usr/share/java/\r\nsudo sed -i ''s/SELINUX=enforcing/SELINUX=disabled/g'' /etc/sysconfig/selinux\r\nsudo yum install ntp -y\r\nsudo chkconfig ntpd on\r\nsudo service ntpd start\r\nexit\r\neof\r\n\r\nfor (( j=0; j<${#hostip[@]}; j++ ))\r\ndo\r\nssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null -tt "$user"@"${hostip[$i]}" <<eof\r\nsudo su\r\necho "${hostip[$j]} ${host_name[$j]}" >> /etc/hosts\r\nexit\r\nexit\r\neof\r\n\r\ndone\r\n\r\ndone\r\n######################################################################################\r\n##############   End Script\r\ndestfolder=`tar -tzf ./$javaarchive |head -1|cut -d/ -f1`\r\n\r\nprintf "\\n\\n\\n"\r\n\r\necho "Java path for Ambari is -  /usr/share/java/$destfolder"\r\n\r\necho "######################################################################################"\r\necho "##############   Thanks for Using Script"\r\necho "######################################################################################"', '', NULL, NULL, NULL, '2017-02-06 09:21:42'),
(4, 'host.sh - Ambari Prerequisites script Part1', '#!/bin/bash\r\n#this script contains all required details\r\n\r\n######## Enter all host''s IP for setting up all Hadoop Prerequites . This is an array each IP should be under quotes and separated by white space.\r\nhostip=("172.26.41.82")\r\n\r\n######## Enter all hostname for setting up all Hadoop Prerequites . This is an array each hostname should be under quotes and separated by white space.\r\nhost_name=("impetus-82server")\r\n\r\n\r\n######## Enter the User name which is being used for Passwordless SSH. User must be sudo user with no Password. Otherwise Script will not work Properly.\r\nusername=("testing")\r\n######## Enter Password for Respective user\r\npassword=(''aims145'')\r\n\r\n######## URL for Downloading Java\r\njavaurl="http://public-repo-1.hortonworks.com/ARTIFACTS/jdk-8u60-linux-x64.tar.gz"\r\n######## Downloaded Archive Name\r\njavaarchive="jdk-8u60-linux-x64.tar.gz"\r\n', '', NULL, NULL, NULL, '2017-02-06 09:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `server_list`
--

CREATE TABLE `server_list` (
  `id` int(10) NOT NULL,
  `server_name` varchar(250) NOT NULL,
  `server_ip` varchar(250) NOT NULL,
  `OS` varchar(100) DEFAULT 'Not Updated',
  `RAM` varchar(100) DEFAULT 'Not Updated',
  `CPU` varchar(100) DEFAULT 'Not Updated',
  `HDD` varchar(100) NOT NULL DEFAULT 'Not Updated',
  `Remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `server_list`
--

INSERT INTO `server_list` (`id`, `server_name`, `server_ip`, `OS`, `RAM`, `CPU`, `HDD`, `Remark`) VALUES
(3, 'impetus-1447', '192.168.41.130', 'Centos6', '8GB', '4', '1TB', 'Ilabs - DB Cluster');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `email` varchar(150) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `fname`, `lname`, `role`) VALUES
(1, 'admin', 'YCuhhuNj8lX3qAJqSf9iTpd402a53A6setYD7nDHhZXQ1GTEc+zMXzAG1g9scWZK2+HsiaK6CjQgQdMhIXODYg==', 'ammu@gmail.com', 'amrit', 'sharma', 'admin'),
(2, 'ammu145', 'SrIg/DnTETgAasjjzfpXBN8UAIKNAvrWIe23TbO3idGid/EFtbwds8lzJYJeYyxBhJHaR78RIlTOSTpdYpCoMg==', 'amrit@ffff.in', 'ammu', 'sharma', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filemgmt`
--
ALTER TABLE `filemgmt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imp_cmds`
--
ALTER TABLE `imp_cmds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imp_links`
--
ALTER TABLE `imp_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imp_scripts`
--
ALTER TABLE `imp_scripts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `server_list`
--
ALTER TABLE `server_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `filemgmt`
--
ALTER TABLE `filemgmt`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `imp_cmds`
--
ALTER TABLE `imp_cmds`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `imp_links`
--
ALTER TABLE `imp_links`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `imp_scripts`
--
ALTER TABLE `imp_scripts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `server_list`
--
ALTER TABLE `server_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
