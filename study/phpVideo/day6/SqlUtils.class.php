<?php

	//面向过程
	class SqlUtils{
			/** 
			* 数据库操作步骤
			* 1. 建立连接
			* 2. 选择数据库
			* 3. 设置操作编码
			* 4. 发送SQL指令
			* 5. 接收返回结果并处理
			* 6. 释放资源,关闭连接
			*/
		const server = 'localhost';
		const username = 'root';
		const password = 'root';

		static function connect($dbname){
			//建立连接
			$conn = mysqli_connect(self::server, self::username, self::password);
			if(!$conn){
				die('数据库连接失败' . mysqli_error());
			}

			//选择数据库
			$conn->select_db($dbname);

			return $conn;
		}

		static function release($rs, $conn){
			if($rs != true && $rs != false){
				//关闭资源
				$rs->close();
			}

			//关闭连接, 并不是立刻关闭，有一段时间
			mysqli_close($conn);
		}

		static function select($sql, $dbname, $result){
			
			$conn = self::connect($dbname);

			//执行SQL语句
			$rs = mysqli_query($conn, $sql);

			//遍历结果
			if(mysqli_num_rows($rs) > 0){
				while($row = mysqli_fetch_assoc($rs)){		//$key 为table属性名
					$tmp = array();
					foreach ($row as $key => $value) {
						array_push($tmp, $key, $value);
					}
					array_push($result, $tmp);
				}
			}else{
				echo "查询结果为空.";
			}

			self::release($rs, $conn);

			return $result;
		}

		static function save($sql, $dbname, $result){
			
			$conn = self::connect($dbname);

			//TODO:

			self::release($rs, $conn);
		}

		static function update($sql, $dbname, $result){

			$conn = self::connect($dbname);

			//TODO:

			self::release($rs, $conn);
		}

		static function delete($sql, $dbname, $result){

			$conn = self::connect($dbname);

			//TODO:

			self::release($rs, $conn);
		}

		static function getFieldName($sql, $dbname, $table_name){
			
			$conn = self::connect($dbname);

			//执行SQL语句
			$rs = mysqli_query($conn, $sql);

			//mysqli_field_seek($rs, 0);

			//获取表属性名
			while($fieldinfo=mysqli_fetch_field($rs)){

				echo $fieldinfo->name . '<br/>';
			
			}
			self::release($rs, $conn);
		}
	}

?>