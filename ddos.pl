#!/usr/bin/perl -w
#
# @File ddos.pl
# @Author Amrit
# @Created Sep 2, 2015 12:16:21 PM
# This Script is for preventing DDOS Attack
$date = `date +"%m-%d-%y-%T"`;
chomp($date);
#print $date;
`netstat -antu|awk 'NR>2'|awk '{print \$5}'|grep -v '*'|cut -d: -f1|sort|uniq -c|sort -n -r|head -20 > /root/scripts/sample.txt`;

open(han1, "cat /root/scripts/sample.txt|awk '{print \$1}'|") or die "can not open file";
open(han2, "cat /root/scripts/sample.txt|awk '{print \$2}'|") or die "can not open file";
open(han3, "cat /root/scripts/ignoreip.txt|") or die "can not open file";
@num = <han1>;
@ip = <han2>;
@ignore = <han3>;

chomp(@num);
chomp(@ip);
chomp(@ignore);

$max_conn = 200;

for($i=0;$i<=$#num;$i++){
################### Check the connections are Exceeding the Limit or Not
    
    if($num[$i] >= $max_conn ){
    print $date." - Following IP has Crossed Limit - ".$max_conn."\n";
    print $date." - ".$ip[$i]." - ".$num[$i]."\n";
            
        if(grep /$ip[$i]/, @ignore){
            print $date." - ignore it - ".$ip[$i]."\n";
        }
            else{
##### get Ip and Number of connections into Array;
                push @black_count, $num[$i];
                push @black_ip, $ip[$i];
                    }
        
    }
    

}
if(@black_ip){
$msg = "Warning........................"."\n\n";
$msg .= "Following IP has been Blocked\n"."\n\n";

for($i=0;$i<=$#black_ip;$i++) {
$msg .= "IP - ".$black_ip[$i]." Has ".$black_count[$i]." Connections "."\n\n"; 
}

$sub = "IP BLocked";


`/usr/bin/sendEmail -s smtp.capitalvia.com:587 -xu "amrit.sharma\@capitalvia.com" -xp Nector145@ -m "$msg" -u "$sub" -t "amrit.sharma\@capitalvia.com" -f "amrit.sharma\@capitalvia.com"`;
print $date." - Email Sent Successfully\n\n";
}
else{
print $date." - No Ip was Found \n\n";
}
