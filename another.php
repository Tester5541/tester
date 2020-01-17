<?
function sql_connect($mysqlhost,$mysqluser,$mysqlpass,$mysqldb){
         $sql_conn=mysql_connect($mysqlhost,$mysqluser,$mysqlpass) or die("mysql_query error: " .mysql_error());
         mysql_select_db($mysqldb);
         }

function sql_execute($query, $get_counter = false)
	{
	static $sqlquerycounter = 0;
	if(isset($_GET['_dbg']) && isset($_GET['_sql'])){pr('['.$sqlquerycounter.'] '.$query);}

	if(!$get_counter)
		{
		 if (!$query = mysql_query($query)) {
			trigger_error('MySQL Error: '.mysql_error());
		  }
		$sqlquerycounter++;
		return $query;
		}
	else {return $sqlquerycounter;}
	}

function sql_close(){
        mysql_close($sql_conn);
        }

		
?>

<?
sql_connect($_CONFIG["mysqlhost"], $_CONFIG["mysqluser"], $_CONFIG["mysqlpass"], $_CONFIG["mysqldb"]);
$sql = sql_execute("SET NAMES UTF8");

$sql = sql_execute("SELECT * FROM publications WHERE id='$_GET[id]' LIMIT 0,1");
$res = mysql_fetch_array($sql);