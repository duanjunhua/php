<?php
	/**
	 *
	 *  PHP date()
	 *  	用于格式化日期/时间，可把时间戳格式化为可读性更好的日期与时间
	 *  时间戳是一个字符序列，表示一定的事件发生的日期/时间
	 *
	 *	string date(string $format [, int $timestamp]);
	 * 	format：
	 * 		a - 小写的上午(am)、下午(pm)
	 * 		g/h -小时，12小时格式， 1-12/01-12
	 * 		G/H - 小时，24小时格式，0-23/00-23
	 * 		i - 分钟数， 00-59
	 * 		s - 秒数， 00-29 
	 * 		d - 代表月中的天(0 ~ 31)
	 * 		m - 代表月(01 ~ 12)
	 * 		Y - 代表年(四位数)
	 * 		j - 月份中的第几天(1 ~ 31)
	 * 		l - 星期几
	 * 		N - 数字表示星期中的第几天，1(星期一)，7(星期天)
	 * 		w - 星期中的第几天 (0：星期天 ~ 6：星期六)
	 * 		e - 时区标志， UTC, GMT etc.
	 * 		
	 */
	
	echo date('Y/m/d ga i s l');
?>