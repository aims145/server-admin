#!/usr/bin/perl
#
# @File listpackages.pl
# @Author Amrit
# @Created Sep 29, 2015 10:17:37 AM
#


use DBI;

$dbh = DBI->connect("DBI:mysql:database=server;host=localhost;port=3306",'root', 'aims145') or die $DBI::errstr;

$server = "Localhost";

sub installed{

@list = `rpm -qa`;
chomp(@list);
#$dbh->do("delete from `server`.`Packages` where server_name='$server' and status='Installed'");
for($i=0;$i<=$#list;$i++){
$dbh->do("INSERT INTO `server`.`Packages` (`server_name`, `package`, `status`) VALUES ('$server', '$list[$i]', 'Installed')");
}
}

sub available{
@avail = `yum list available |grep '.el'|awk '{print \$1}'|grep -F '.'`;
chomp(@avail);

#$dbh->do("delete from `server`.`Packages` where server_name='$server' and status='Available'");
for($i=0;$i<=$#avail;$i++){
$dbh->do("INSERT INTO `server`.`Packages` (`server_name`, `package`, `status`) VALUES ('$server', '$avail[$i]', 'Available')");

}

}



#yum list available |grep '.el'|awk '{print $1}'
installed();
available();