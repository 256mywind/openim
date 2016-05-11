<?php
include "../../common/openim/TopSdk.php";
date_default_timezone_set('Asia/Shanghai');

$c = new TopClient;
$c->appkey = "23249024";
$c->secretKey = "0120f6ac704bfc106f00ac4340d2b32e";
$c->gatewayUrl = "http://gw.api.taobao.com/router/rest";
$c->format = "json";

function initUserinfos($userid) {
    $userinfos = new Userinfos;
    $userinfos->userid = $userid;    //必填
    $userinfos->password = "123";  //必填
    $userinfos->nick = "king12";
    $userinfos->icon_url = "http://xxx.com/xxx";
    $userinfos->email = "coopcoop1@163.com";
    $userinfos->mobile = "13995588941";
    $userinfos->taobaoid = "";
    $userinfos->remark = "demo";
    $userinfos->extra = json_encode(array('demo'=>'demo'));
    $userinfos->career = "demo";
    $userinfos->vip = json_encode(array('demo'=>'demo'));
    $userinfos->address = "demo";
    $userinfos->name = "demo";
    $userinfos->age = "123";
    $userinfos->gender = "M";  //性别。M: 男。 F：女
    $userinfos->wechat = "demo";
    $userinfos->qq = "demo";
    $userinfos->weibo = "demo";
    //echo json_encode($userinfos);
    return $userinfos;
}

function addOpenImUser($userid) {
    global $c;
    $req = new OpenimUsersAddRequest;
    $userinfos = initUserinfos($userid);

    //$userinfos = initUserinfos($userid2);
    //echo  json_encode(array(0 => $userinfos1, 1 => $userinfos2));
    //$req->setUserinfos(json_encode(array(0 => $userinfos1, 1 => $userinfos2)));
    $req->setUserinfos(json_encode($userinfos));
    $resp = $c->execute($req);
    print_r($resp);
}

function getOpenImUser($userids) {
    global $c;
    $req = new OpenimUsersGetRequest;
    $req->setUserids($userids);
    $resp = $c->execute($req);
    print_r($resp);
}

function deleteOpenImUser($userids) {
    global $c;
    $req = new OpenimUsersDeleteRequest;
    $req->setUserids($userids);
    $resp = $c->execute($req);
    print_r($resp);
}

echo '<pre>';
print_r("添加用户:");
addOpenImUser("a123");
addOpenImUser("a124");

print_r("查询两个用户:");
getOpenImUser("a123,a124");

print_r("删除两个用户:");
deleteOpenImUser("a123,a124");