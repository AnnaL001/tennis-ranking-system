 <?php
 function bcrypt($pass_input){
    $crypt_options = array(
      'cost' => 10,
      'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
    );
    return password_hash($pass_input, PASSWORD_BCRYPT, $crypt_options);
  }?>