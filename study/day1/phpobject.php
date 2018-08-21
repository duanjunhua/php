<?php
	
	//php面向对象
	//对象三特性：
	/**
	 * 1. 行为(方法，函数)
	 * 2. 形态
	 * 3. 表示
	 */
	
	/**
	 * 面向对象的内容：
	 * 	1. 类
	 * 	2. 对象
	 * 	3. 成员变量
	 * 	4. 成员函数
	 * 	5. 父类：也称为基类或超类
	 * 	6. 子类：也称派生类
	 *  7. 重载
	 *  8. 抽象
	 *  9. 构造函数
	 *  10. 析构函数
	 * 
	 * 三特性：
	 * 		多态、继承、封装
	 */
	
	/**
	 * php类定义:
	 * 	class PhpClass{
	 * 		var $val1;
	 * 		var $val2 = "constant string";
	 * 		//...
	 *
	 * 		function phpFunc($arg1 [, $arg2, ...]){
	 * 			//...
	 * 		}
	 * 		//...
	 * 	}
	 *
	 * 创建对象：
	 * 		$phpObj = new PhpClass;
	 * 调用成员方法：
	 * 		$phpObj->setVal1("test");
	 * 		$phpObj->getVal1();
	 */
	class Site{
		//成员变量
		var $url;
		var $title;

		//成员函数
		function setUrl($url){
			$this->url = $url;
		}
		function getUrl(){
			echo "Url: " . $this->url . "<br>";
		}
		function setTitle($title){
			$this->title = $title;
		}
		function getTitle(){
			echo "Title: " . $this->title . "<br>";
		}
	}

	$google = new Site;
	$google->setUrl("www.google.com");
	$google->setTitle("Google");

	$google->getTitle();
	$google->getUrl();

	echo "<hr>";

	/**
	 * php构造函数：
	 * 	主要用于创建对象时初始化对象
	 * 	void __construct(mixed $args [, $args1, ...])
	 *
	 * 子类调用父类的构造方法需要声明：
	 * 	class Parent{
	 * 		function __construct($gras){
	 * 			//...
	 * 		}
	 * 	}
	 *  class Sub extends Parent{
	 *  	function __construct($agrs){
	 *  		parent::__construct($args);
	 *  		//.....
	 *  	}
	 *  }
	 * 
	 * php析构函数：
	 * 	void __destruct(void);
	 */

	class WebSite{
		var $url;
		var $title;

		//构造函数
		function __construct($url, $title){
			$this->url = $url;
			$this->title = $title;
		}

		function setUrl($url){
			$this->url = $url;
		}
		function getUrl(){
			echo "Url: " . $this->url . "<br>";
		}
		function setTitle($title){
			$this->title = $title;
		}
		function getTitle(){
			echo "Title: " . $this->title . "<br>";
		}

		//析构函数
		function __destruct(){
			print "Destroy " . $this->url;
		}
	}
	
	$taobao = new WebSite("www.taobao.com", "TaoBao");

	$taobao->getTitle();
	$taobao->getUrl();

	/**
	 * 继承：使用extends关键字：
	 * 	class Child extends Parent{
	 * 		//...
	 * 	}
	 *
	 * 重写：子类可以重写父类方法于子类中
	 * 访问权限：
	 * 	public > protected > private
	 * 	类属性必须定义为公有，默认的var为public
	 *
	 * 	class PhpClass{
	 * 		public $pub = "public val";
	 * 		protected $pro = "protected val";
	 * 		private $pri = "private val";
	 * 	}
	 *
	 *  类方法默认权限为public
	 */
	
	/**
	 * 接口： interface
	 * 	接口中定义的所有方法都必须是公有的(接口特性)
	 * 	实现接口使用implements操作符
	 * 	类可以实现多个接口，接口之间使用逗号分割
	 *
	 * 声明：
	 * 	interface Int{
	 * 		//..
	 * 	}
	 *
	 * 实现：
	 * 	class PhpImpClass implements Int1, Int2{
	 * 		//实现接口中的方法
	 * 		//...
	 * 	}
	 * 	
	 */

	/**
	 * 常量：const
	 * 	在定义和使用常量的时候不需要使用"$"符
	 * 	常量不能是类属性、数学运算的结果或函数调用
	 *
	 * 声明：
	 * 	class ConstClass{
	 * 		const CONST_TEST = "const define";
	 *   	//...
	 *   	//获取常量：
	 *   	function printConst{
	 *   		echo self::CONST_TEST;
	 *   	}
	 *   	
	 * 	}
	 *
	 * 访问：
	 * 	1. ConstClass::CONST_TEST;
	 * 	2. $class = "ConstClass";
	 * 		$class::CONST_TEST
	 */
	
	/**
	 *
	 * 抽象类：
	 * 	任何一个类，若里面至少有一个方法是被声明为抽象的，name这个类就必须声明为抽象的
	 * 	定义为抽象的类不能被实例化
	 *
	 * 声明：
	 * 	abstract class AbstractPhpClass{
	 * 		//抽象方法，子类继承后必须定义
	 * 		abstract protect function getValue();
	 * 		abstract function saveData($data);
	 * 	 	//一般方法
	 * 	 	public function printMessage(){
	 * 	 		print $this->getValue();
	 * 	 	}
	 * 	}
	 * 实现：
	 * 	class ParentClass extends AbstractPhpClass{
	 * 		protected function getValue(){
	 * 			return "getValue";
	 * 		}
	 * 		//子类方法可以包含父类抽象方法中不存在的可选参数
	 *   	public function saveData($data [$args, ....]){
	 *   		//....
	 *   	}
	 * 	}
	 * 	
	 */
	
	/**
	 *
	 * Static关键字：
	 * 	声明类属性或方法为static，则不可以实例化类，可以直接访问
	 * 	静态属性不能通过一个类已实例化的对象来访问，但静态方法可以
	 * 	伪变量$this在静态方法中不可用，且不可通过"->"操作符访问
	 *
	 * 声明：
	 * 	class StaticClass{
	 * 		public static $stVal = "stativ value";
	 * 		public function staticValue(){
	 * 			return self::$stVal;
	 * 		}
	 * 	}
	 *
	 * 访问：
	 * 	1. print StaticClass::$stVal;
	 *  2. $staticClass = new StaticClass();
	 *  	print $staticClass->staticValue();
	 *  	
	 */
	
	/**
	 *
	 * Final关键字：
	 * 	若父类中的方法被声明为final，则子类无法覆盖，若类被声明final，则不能被继承
	 */
?>