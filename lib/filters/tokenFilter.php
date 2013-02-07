<?php
class myTokenFilter extends sfFilter {

  public function execute ($filterChain)
  {
    $request = sfContext::getInstance()->getRequest();
    $token = $request->getParameter('token', false);

    if(!$token) {
      die(json_encode(array('status' => 'fail', 'error_code' => '100', 'error_messsage' => 'token does not present')));
    }

    $partner = Doctrine::getTable('Partners')->findOneBy('token', $token);

    if(!$partner){
      die(json_encode(array('status' => 'fail', 'error_code' => '101', 'error_messsage' => 'wrong token supported')));
    }
    // execute next filter
    $filterChain->execute();
  }
}