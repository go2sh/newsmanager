<?php
defined('C5_EXECUTE') or die(_("Access Denied."));

class NewsManagerPackage extends Package {

     protected $pkgHandle = 'newsmanager';
     protected $appVersionRequired = '5.3.0';
     protected $pkgVersion = '1.0';

     public function getPackageDescription() {
          return t("Package for News Page.");
     }

     public function getPackageName() {
          return t("News Manager");
     }
     
     public function install() {
          $pkg = parent::install();
     
          // install block 
	Loader::model('single_page');
	$sp = SinglePage::add('/dashboard/newsmanager', $pkg);
        $sp->update(array('cName'=>t("News Manager"), 'cDescription'=>t("The News Manager.")));
	$sp = SinglePage::add('/dashboard/newsmanager/list', $pkg);
        $sp->update(array('cName'=>t("List"), 'cDescription'=>t("Lists the news articels.")));
	$sp = SinglePage::add('/dashboard/newsmanager/config', $pkg);
        $sp->update(array('cName'=>t("Configuration"), 'cDescription'=>t("Change the configuration of the News Managern.")));
     }
     
}
?>
