<?php

  /**
   * Controlling vars
   */
  $tab = "medical";
  $nav = "searchform";

  /**
   * Checking permissions
   */
  require_once("../auth/login_check.php");
  loginCheck(OPEN_PROFILE_DOCTOR);

  require_once("../lib/Form.php");

  /**
   * Show page
   */
  $title = _("Search Patient");
  $focusFormField = "search_text"; // to avoid JavaScript mistakes in demo version
  require_once("../layout/header.php");

  $headerWording2 = _("Search Patient by Medical Problem");
  $returnLocation = "../medical/index.php";

  /**
   * Breadcrumb
   */
  $links = array(
    _("Medical Records") => $returnLocation,
    $title => ""
  );
  echo HTML::breadcrumb($links, "icon icon_search");
  unset($links);

  $tokenForm = Form::generateToken(); // for 2 forms (patient, problem)

  /**
   * Patient search form
   */
  echo HTML::start('form', array('method' => 'post', 'action' => '../medical/patient_search.php'));
  require_once("../medical/patient_search_fields.php");
  echo HTML::end('form');

  echo HTML::rule();

  /**
   * Problem search form
   */
  echo HTML::start('form', array('method' => 'post', 'action' => '../medical/problem_search.php'));
  require_once("../medical/problem_search_fields.php");
  echo HTML::end('form');

  echo Msg::hint('* ' . _("Note: Empty search to see all results."));

  require_once("../layout/footer.php");
?>
