<?php
/*
  #########################
  
  Version : 1.0 beta;
  
  By : Adam daaif
  
  Class name : SimpleDb
  
*/

namespace Lestroisw\Adam;

	class Dodb{

		public $table;

		public $db;

		public $vals;

		static function insert($table, $vals = []){

				$db_query = "INSERT INTO `$table` (";

				$columns = "";

				$variables = "";

				foreach($vals as $key => $val){

					$columns .= "`" . $key . "`, ";
					if($val == "date_func"){
						$variables .= "now(), ";
					}
					else{
						$variables .= "'$val', ";
					}
				}

				$db_query .= rtrim($columns, ", ").") VALUES (";

				$db_query .= rtrim($variables, ", ").")";

				$do = mysql_query($db_query);
		}

		static function getData($where, $db){

		  $db_query = mysql_query("SELECT * FROM `$db` WHERE $where");

		  $db_query_return = mysql_fetch_array($db_query);

		  return $db_query_return;

		}
		
		static function display_db($db, $where, $order_by, $desc, $limit){
		
			$db_display = [];
			
			$sql = mysql_query("SELECT * FROM `$db` $where ORDER BY $order_by $desc $limit");
				
				while($sql_re = mysql_fetch_array($sql)){
				
					$db_display[] = $sql_re;
				
				}
				
				return $db_display;
		}
			
		static function updateDb($db, $where, $tables){
			
					
					$sql = mysql_query("UPDATE `$db` SET $tables WHERE $where");
					
					if($sql==true){
						
						return true;
						
					}
					
				
		}
		
		static function checkifexiste($db, $where){
			
				$sql = mysql_query("SELECT * FROM `$db` $where");
				
				if(@mysql_num_rows($sql) != 0){
					
					return true;
					
				}
				
				return false;
				
			}
        
        public function countDb($where, $db){
            
            $sql = mysql_query("SELECT * FROM `$db` $where");
            
            if($sql==true){
                
                return intval(mysql_num_rows($sql));
            }
            
            return 0;
            
        }    
}

?>
