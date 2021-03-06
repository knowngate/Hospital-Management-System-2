<?php

  require_once(dirname(__FILE__) . "/../lib/exe_protect.php");
  executionProtection(__FILE__);

  /**
   * @since 0.8
   */
  ini_set('session.use_cookies', 1); // cookies will be used for propagation of the session ID
  ini_set('session.use_only_cookies', 1); // a session ID passed in the URL to the script will be discarded

  session_name("OpenClinic");
  session_cache_limiter("nocache");
  session_start();
?>
