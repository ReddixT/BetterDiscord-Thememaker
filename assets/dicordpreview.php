<?php

$curl_session = curl_init();
curl_setopt($curl_session, CURLOPT_URL,"https://discordapp.com/developers/docs/");
$result = curl_exec($curl_session);
curl_close($curl_session);
echo $result;

?>


<!DOCTYPE html>

<a href="https://discord.com">Discord</a>
</html>