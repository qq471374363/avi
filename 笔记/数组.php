<?php 
	$arr=array('a','b','c','d','e','f');
//>>>array_keys():把数组中的下标提出来放到一个数组中,返回一个数组
	var_dump( array_keys($arr));
//>>>array_values():把数组中的值提出来放到一个数组中,返回一个数组
	var_dump(array_values($arr));
//>>>implode()把数组的values部分组合成字符串,第一个参数可选(分隔符号),第二个需要分隔的数组,返回一个字符串
	var_dump( implode('=>',array_values($arr)));
//>>>explode()把字符串打散为数组,以=>把字符串分隔开,合成一个索引数组,返回一个数组
	var_dump(explode('=>',implode('=>',array_values($arr))));
//>>>array_filp()  数组的键和值互换位置
	var_dump(array_flip($arr));
//>>>array_shift()  删除数组的第一个元素并弹出来,先进先出后进后出	
	var_dump(array_shift($arr));var_dump($arr);
//>>>array_unshift()向数组插入一个或多个元素,返回数组的新长度,先进先出后进后出	
	var_dump(array_unshift($arr,'new1','new2'));var_dump($arr);
//>>>array_pop()删除数组的最后一个元素,并弹出,先进先出后进后出	
	var_dump(array_pop($arr));var_dump($arr);
//>>>array_push()向数组插入元素,只能插入索引,不建议使用;用array[]='last1';更快更简单没有调用函数的额外负担,先进先出.
	var_dump(array_push($arr,'last1','last2'));var_dump($arr);
//>>>foreach($arr as $key=>$value){}遍历数组
    foreach($arr as $key=>$value){echo $key."=>".$value."<br>";};
//>>>for($i=0;$i<=count($arr);$i++){} 用for遍历数组
    for($i=0;$i<count($arr);$i++){echo $arr[$i];}
//>>>key();获取到当前数组指针指向的元素的键名(下标)
    var_dump(key($arr));
//>>>current();获取到当前数组指针指向的元素的值  英[ˈkʌrənt]美[ˈkɜrənt] 单词意思:现在的
    var_dump(current($arr));
//>>>next()将数组的指针向下移一位,返回数组内部指针指向的下一个单元的值,当数组的指针移出去了就会返回false!
	var_dump(next($arr));
//>>>reset();将数组中的指针进行重置
	var_dump(reset($arr));
//>>>prev();将数组的指针向上移一位
	var_dump(prev($arr));
//>>>end();将数组的指针移动到最后一位
	var_dump(end($arr));
//>>>for循环遍历数组
//>>>重置指针
	reset($arr);
//>>>遍历
	for($j=0;$j<count($arr);$j++){echo key($arr)."==>".current($arr),"<br>";next($arr);}
//>>>list()将一个索引数组下标为0的元素赋值给list这个函数中第一个参数，下标为1的赋值给list函数中的第二个参数……
	//list($a,$b,$c)= array(0=>'11',1=>'22',2=>'33');
//>>>count();获取数组的长度  数组中元素的总个数 
	echo count($arr);
//>>>range(开始位置,结束位置,步长)创建一个指定范围内的数组  步长:一步跨几个字符
	var_dump(range('a','z',2));
//>>>array_merge();合并数组 索引数组重复下标会重新给下标赋值,关联会覆盖
	array_merge($arr1,$arr2)
//>>>array_rand($arr,数量);从数组中随机取出数组下标组成有规律的索引数组
	array_rand($arr,4);
//>>>shuffle();将原数组打乱组成一个索引数组
	shuffle($arr);			
//>>>验证码
	$arr1=array_merge(range('a','z'),range('A','Z'),range(0,9));
	shuffle($arr1);
	echo implode(array_rand(array_flip($arr1),4));
//>>>in_array(元素,$arr);判断元素有没有在数组中,返回布尔值
	var_dump(in_array('c',$arr));
//>>>array_key_exists(下标,$arr);判断数组中有没有这个键值,返回布尔值
	var_dump( array_key_exists(9,$arr));
sort()//>>对数组元素进行升序  重新生成了一个新的数组！这个数组的键名与值是重新进行排列！
asort()//>>也是对数组元素进行升序排序  但是保留了原数组的下标与值之间的关系！
rsort()//>>对数组进行降序排序,重新生成了一个新的数组！这个数组的键名与值是重新进行排列！
arsort()//>>也是对数组元素进行降序排序  但是保留了原数组的下标与值之间的关系！
array_reverse()//函数将原数组顺序翻转，创建新的数组并返回。如果第二个参数指定为 true，则元素的键名保持不变，否则键名将丢失。
addslashes()//>>>防sql注入
extract();//>>>解压数组把下标变成变量
array_unique(array)//数组去重 
array_reverse()// 函数以相反的元素顺序返回新数组
array_search ('要搜索的字符串','数组')// 在数组中搜索给定的值，如果成功则返回相应的键名 
array_key_exists($key,array)// 检查给定的键名或索引是否存在于数组中
$name='a' $age=1; compact('name','age')//输出关联数组 name=a,age=1  参数必须和变量名一样
		

