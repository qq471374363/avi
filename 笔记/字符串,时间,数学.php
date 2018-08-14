<?php
implode()//它有一个别名函数：join()
		//将一个数组的中元素连接为一个字符串 
		//string implode ( string $glue , array $pieces )
		//string $glue：这个参数表示是指定的连接符号
		//array $pieces：将指定的数组进行连接
explode()//将一个字符串分割为一个数组
		//array explode ( string $delimiter , string $string [, int $limit ] )
		//string $delimiter：指定的分隔符
		//string $string：指定的字符串 
strlen('')//返回的是指定字符串的字节的长度！
substr(string,start,length) //函数返回字符串的一部分。注释：如果 start 参数是负数且 length 小于或等于 start，则length 为 0。
		/*string	必需。规定要返回其中一部分的字符串。
		start	必需。规定在字符串的何处开始。
				正数 - 在字符串的指定位置开始
				负数 - 在从字符串结尾开始的指定位置开始
				0 - 在字符串中的第一个字符处开始
		length	可选。规定被返回字符串的长度。默认是直到字符串的结尾。
				正数 - 从 start 参数所在的位置返回的长度
				负数 - 从字符串末端返回的长度*/
strtolower('')//将大写字母转换为小写
strtoupper('')//将小写字母转换为大写
mb_strlen ( string $str [, string $encoding = mb_internal_encoding() ] )//获取字符串的长度
				
			//encoding 参数为字符编码。如果省略，则使用内部字符编码。
			//返回具有 encoding 编码的字符串 str 包含的字符数。 多字节的字符被计为 1。 如果给定的 encoding 无效则返回 FALSE。
mb_internal_encoding()// 设置/获取内部字符编码
iconv_strlen()// 返回字符串的字符数统计
strlen()//获取字符串长度
ucfirst()//将字符串的首字母转换为大写
strpos()//查找子字符在原字符串首次出来的位置   如果找的到就返回其下标，如果找不到返回false 
strrpos ()//查找子字符在原字符串最后次出来的位置   如果找的到就返回其下标，如果找不到返回false
strrev()//将字符串进行翻转
trim()//用于去除字符串的首尾的空白字符 
explode()//使用指定的分隔符将一个字符串分隔为数组 
date_default_timezone_set('PRC')//设置一个时区
ini_set('data.timezone','PRC')//设置一个时区
date_default_timezone_get()//获取到设置的时区
time()//获取一个UNIX时间戳  是1970年1月1日0时0分0秒时间的秒数
date()//将一个时间戳格式化为一个本地的时间,第二个参数如果不写表示当前的时间戳
strtotime()//将任何英文文本的日期时间描述解析为 Unix 时间戳
microtime()//返回当前 Unix 时间戳和微秒数
数学函数
abs()//返回一个数的绝对值
sqrt()//返回一个数的平方根
pow(x,y)//返回一个x的y次幂
ceil()//向上取整  得到一个比当前数要大的最小的整数 
floor()//向下取整  得到一个比当前数要大的最大的整数 
round()//一个数进行四舍五入,第一个参数：表示一个数;第二个参数：可选的,如果没有写表示,不保留小数位,如果有写就表示保留几位小数
rand('str','str');//返回一个闭合区间的随机整数
mt_rand('str','str');//返回一个闭合区间的随机整数
		//这两个函数之间的区别在于：mt_rand的速度比rand的速度快4倍！


