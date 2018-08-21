<?php
namespace TestMagic;	//namespace必须顶格写，且只能在最开始
	//php魔术变量
	//有八个魔术常量他们的值随着它们在代码中的位置改变而改变


	//__LINE__：文件中的当前行号
	echo "'测试 __LINE__'：这是第 " . __LINE__ . " 行<br>";

	
	//__FILE__：文件的完整路径和文件名，如果用在被包含文件中，则返回被包含的文件名，php4.0.2之后，总是包含一个绝对路径
	echo "'测试 __FILE__'：该文件位于 " . __FILE__ . " 文件中<br>";


	//__DIR__：文件所在的目录，如果用在被包括文件中，则返回被包括的文件所在的目录，等价于dirname(__FILE__)
	echo "'测试 __DIR__'：该文件位于 " . __DIR__ . " 目录下<br>";


	//__FUNCTION__：函数名称，返回该函数定义时的名字(区分大小写)
	function TestFunction(){
		echo "'测试 __FUNCTION__' ： 函数名为: " . __FUNCTION__ . "<br>";
	}
	TestFunction();

	//__CLASS__：类的名称，返回该类被定义的名字(区分大小写)
	class Test{
		function _print(){
			echo "'测试 __CLASS__ ' : 类名为：" . __CLASS__ . "<br>";
			echo "函数名为：" . __FUNCTION__ . "<br>";
		}
	}

	$t = new Test();
	$t->_print();		//对象调用类方法


	//__TRAIT__：实现代码复用，优先顺序是当前类中的方法会覆盖trait方法，而trait方法又覆盖了基类中的方法
	class Base{
		public function sayHello(){
			echo "Hello ";
		}
	}

	trait SayWorld{
		public function sayHello(){
			parent::sayHello();
			echo "World!<br>";
		}
	}

	class HelloWorld extends Base{
		use SayWorld;
	}

	$hello = new HelloWorld();
	$hello->sayHello();

	//__METHOD__：类的方法名，返回该方法被定义时的名字
	class TestMethod{
		public function method(){
			echo "'测试 __METHOD__'： 类的该方法名为:" . __METHOD__ . "<br>";
		}
	}

	$method = new TestMethod();
	$method->method();

	//__NAMESPACE__：当前命名空间的名称(区分大小写)，php5.3.0以上
	/**
	 * 命名空间的作用：
	 * 	1. 用户编写的代码与PHP内部的类/函数/常量或第三方之间的名字冲突
	 * 	2. 为很长的标识符名称创建一个别名，提高源代码的可读性
	 */
	// namespace TestMagic;
	echo "测试 '__NAMESPACE__', 命名空间为：" . __NAMESPACE__ . "<br>";
?>