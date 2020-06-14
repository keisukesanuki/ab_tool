<?php
$nor = "";
$not = "";
$url = "";
$return_var = "";
$date = "";

if (isset($_POST["Number_of_requests"])){
	$nor = $_POST["Number_of_requests"];
}
if (isset($_POST["Number_of_threads"])){
        $not = $_POST["Number_of_threads"];
}
if (isset($_POST["url_ad"])){
        $url = $_POST["url_ad"];
}
?>

<!DOCTYPE html>
<html lang = "ja">
		<head>
			<mera charset = "UFT-8">
			<link rel="stylesheet" href="./default.css" type="text/css">
		<title>load tool</title>
		</head>
	<body>
		<h4>Apache Bench</h4>
		<form action="" method ="post">
		<div class="cp_iptxt">
			<p>Number of requests<input type="text" name="Number_of_requests"></p><br/>
			<i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
		</div>
		<div class="cp_iptxt">
			<p>Number of threads<input type="text" name="Number_of_threads"></p><br/>
			<i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"></i>
		</div>
		<div class="cp_iptxt">
			<p>URL<input type="text" name="url_ad"></p><br/>
			<i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"></i>
		</div>
			<input type = "submit" value ="実行" class="btn">
		</form>
        </body>
</html>

<?php
if (isset($_POST["url_ad"])){
	$date = date("H:i:s");
	#結果を出力するディレクトリ名を定義
	$resultdir = "result";
	#ドキュメントルートを定義
	$doc_root = "/opt/ab_tool";
        #ホスト自身のIPアドレスを定義
        $server_ip = "192.168.33.10";

	$outdir = "$doc_root/ab_tool/$resultdir";
	mkdir("$outdir");
	touch("$outdir/$date.html");
	$outfile = "$outdir/$date.html";
        $exe_ab = "/bin/ab -n $nor -c $not -w -x border=1 -y align=left -z bgcolor=#ccc $url > $outfile";
        exec($exe_ab, $inet, $return_var);
	if ( $return_var == 0){
        	$return_result = "処理が完了しました。";
	}else{
        	$return_result = "エラーが発生しました。";
}
        echo "実行結果：".$return_result;
	echo "<br />";
	echo "http://$server_ip/ab_tool/$resultdir/$date.html";
}

#print_r($inet[21]);
?>
