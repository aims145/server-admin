#!/usr/bin/perl 
# For Sending mail Alerts 


use DBI;
use POSIX qw(strftime);
use MIME::Lite;
use List::MoreUtils qw(uniq);

$dbhost = "localhost";
$db = "cvserver_admin";
$dbuser = "root";
$dbpass = "aims145";

$dbh = DBI->connect("DBI:mysql:database=$db;host=$dbhost;port=3306",$dbuser, $dbpass) or die $DBI::errstr;



$query = "SELECT credentials.* ,users.username as userlogin, users.email  from credentials  INNER JOIN users  on credentials.user_id = users.id where datediff(now(), Date) = pass_expiry";
$sth = $dbh->prepare($query);
$sth->execute();
while(@row = $sth->fetchrow_array()){
	# push @server_ip, $row[0]	;
	push @server_name, $row[1];
	push @server_ip, $row[2];
	push @proto, $row[3];
	push @uname, $row[4];
	push @expiry, $row[6];
	push @euid, $row[7];
	push @cdate, $row[9];
	push @userlogin, $row[10];
	push @email, $row[11];
}

@uniqemail = uniq @email;

if(scalar(@uniqemail) > 0){ 


for($i=0;$i<scalar(@uniqemail);$i++){

	print $uniqemail[$i]."\n";
	for($j=0;$j<=$#server_name;$j++){
		if($uniqemail[$i] eq $email[$j]){
		push @allserver_name, $server_name[$j];
		push @allserver_ip, $server_ip[$j];
		push @allproto, $proto[$j];
		push @alluname, $uname[$j];
		push @allemail, $email[$j];
		push @allexp, "Today";			
		push @alluser, $userlogin[$j];
		}
	}
	$content = "<table style='width: 100%;'><tr style='background-color: #f2f2f2;'><th style='background-color: #4CAF50;color: white;text-align: left;padding: 8px;'>Server Name</th><th style='background-color: #4CAF50;color: white;text-align: left;padding: 8px;'>Server IP</th><th style='background-color: #4CAF50;color: white;text-align: left;padding: 8px;'>Server</th><th style='background-color: #4CAF50;color: white;text-align: left;padding: 8px;'>User Name</th><th style='background-color: #4CAF50;color: white;text-align: left;padding: 8px;'>Expiring</th></tr>

			";
	for($k=0;$k<=$#allserver_name;$k++){
	$content.= "<tr><td style='text-align: left;padding: 8px;'>".$allserver_name[$k]."</td><td style='text-align: left;padding: 8px;' >".$allserver_ip[$k]."</td><td style='text-align: left;padding: 8px;' >".$allproto[$k]."</td><td style='text-align: left;padding: 8px;' >".$alluname[$k]."</td><td style='text-align: left;padding: 8px;' >".$allexp[$k]."</td></tr>";	

	}
	$content .= "</table>";
	$to = $uniqemail[$i];
	$user = ucfirst($alluser[0]);
	mailer_pass($content,$to, $user);

	undef @allserver_name; 
	undef @allserver_ip;
	undef @allproto;
	undef @alluname;
	undef @allemail; 
	undef @allexp;		
	undef @alluser;
	
}

}


sub mailer_pass {
$content = $_[0];
$to = $_[1];
$user = $_[2];
$from = 'amrit.sharma@capitalvia.com';
$subject = "Password has been expired !";
$message = "
<div style='padding: 10px;border: 2px solid;'><h1 style='text-align: center;background: #4CAF50;color: white;padding: 15px;font-size: 25px;'>Please check following Passwords are about to Expire.</h1><p></p>
		<h3>Dear $user,</h3>
<p></p>
<p>Following credentials are going to expire , Kindly change it ASAP. </p>
<br />
".$content."
<br />

<p style='font-weight:bolder;'>
For More Info Kindly Contact to Server Admin - amrit.sharma\@capitalvia.com <br />
</p>
</div>";

    

$msg = MIME::Lite->new(
                 From     => $from,
                 To       => $to,
                 Subject  => $subject,
                 Data     => $message
                 );
                 
$msg->attr("content-type" => "text/html");         
$msg->send;
print "Email Sent Successfully\n";
}


