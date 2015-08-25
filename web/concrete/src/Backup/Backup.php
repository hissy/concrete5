<?php
namespace Concrete\Core\Backup;
use Loader;
use Ifsnop\Mysqldump as IMysqldump;
use Database;
class Backup {

	public function execute($encrypt = false) {
		$db = Loader::db();
		if (!file_exists(DIR_FILES_BACKUPS)) {
			mkdir(DIR_FILES_BACKUPS);
			file_put_contents(DIR_FILES_BACKUPS . "/.htaccess","Order Deny,Allow\nDeny from all");
		}
		$str_bkupfile = "dbu_". time() .".sql";
		
		try {
			$conn = Database::get();
			$params = $conn->getParams();
			$dump = new IMysqldump\Mysqldump($params['database'], $params['username'], $params['password']);
			$dump->start(DIR_FILES_BACKUPS . "/" . $str_bkupfile);
			if ($encrypt == true) {
				$crypt = Loader::helper('encryption');
				// TODO: Encryption
			}
		} catch (\Exception $e) {
			$this->set('error', $e);
		}
	}

}
