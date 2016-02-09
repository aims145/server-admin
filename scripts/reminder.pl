#!/usr/bin/perl -w
#
#
#
use POSIX qw(strftime);
use DBI;


$dbh = DBI->connect("DBI:mysql:database=test;host=localhost;port=3306",'root', 'aims145') or die $DBI::errstr;

#"SELECT TIMESTAMPDIFF(MINUTE, '2015-11-03 14:40:30', date_time) AS minute_different FROM reminders"

$cdate = strftime "%F %H:%M:%S", localtime;
#print $cdate."\n";

$query = "SELECT TIMESTAMPDIFF(MINUTE, '".$cdate."', date_time) AS minute_different FROM reminders";
$sth = $dbh->prepare($query);
$sth->execute();
while (@row = $sth->fetchrow_array()) {
	push @timediff, @row;
}

#print $query."\n";


$query = " SELECT * from `reminders`";
$sth = $dbh->prepare($query);
$sth->execute();
     
while (@row = $sth->fetchrow_array()) {
	push @id, $row[0];
	push @title, $row[1];
	push @datetime, $row[2];
	push @desc, $row[3];
	push @status, $row[4];
#	push @time, $row[5];
}

$msg = '';
$j = 1;
for($i=0;$i<=$#id;$i++){
if(($timediff[$i] < 60) && ($timediff[$i] > 0)) {
if($status[$i] eq 0){
$msg .= $j.".  ".$title[$i]." - ".$datetime[$i]." - ".$desc[$i]."<br />\n";
$dbh->do("update reminders set status='1' where id='".$id[$i]."'");
#print "hello"."\n";
$j++;
}

	}
}

if($msg ne ''){
`sendEmail -s smtp.capitalvia.com:587 -xu amrit.sharma\@capitalvia.com -xp Nector145\@ -t amrit.sharma\@capitalvia.com -f reminder\@capitalvia.com -l /var/log/sendEmail -u "Reminder for Tasks" -m "<h1 style='color:black;font-size:20px;'>$msg'</h1>" -o message-content-type=text/html `;
#print $msg;
}



