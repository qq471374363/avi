<?php
file_exists(file)//用于判断文件是否存在
filemtime(file)//用于判断文件修改时间
filesize(file)//用于获取文件修的大小
basename(file)//用于一个路径字符串中的文件名部分
realpath(path)//	用于判断指定的path是否在当前环境下是真实存在的。如果不存在则返回false如果存在则格式化路径，返回绝对路径，将路径分隔符转换为’\’
fopen(file,mode)//打开文件,执行成功返回资源类型
fclose(handle)//handle是一个文件资源fopen函数返回值
fwrite(handle,data)//handle是一个文件资源fopen函数返回值,data所要写的数据
fwrite(handle,'\r\n')//写入数据并换行
file_put_contents(file,data)//file是一个表示文件的路径的字符串,data是所要写的数据,一次性写入，不需要先fopen文件
fgetc(handle)//用于读取一个字节字符
fgets(handle【,len】)//每次读取len-1个字节的字符，len可以省略，如果省略表示1024,遇到换行回车就结束读取
fread(handle,len)//每次读取len-1个字节的字符，无视换行回车
file(file)//一次性读取文件所有的行，并将每一行转换为数组的元素输出
readfile(file)//一次读取文件的所有的内容，并直接放在输出缓存中。
file_get_contents(file)//一次性读取文件所有的内容
copy(source，path)//用于复制文件，复制的同时可以改名及改位置
unlink(file)//删除文件
is_file(file)//文件的判断
ftell(handle)//获取当前指针所在的位置
flock(handle,type)//用于锁定打开的文件type表示锁的类型LOCK_EX
iconv(原编码，目标编码，数据)
mkdir(path【,right,recursive】)//path表示所要创建的目录,right权限,recursive取值为boolean，当为true时,可以一次性创建多个层级的目录。
opendir(path)//path是一个表示路径的字符中,如果执行成功返回的是一个资源类型。
closedir(handle)//用于关闭指定的文件夹
rename(source,dest)//目录重命名,source原名,dest新名
rmdir(path)//用于删除文件夹
readir(handle)//handle是文件夹资源，是opendir()返回值//用于读取文件夹中的内容，每次只读取1个条目，并将指针下移。
scandir(path)//用于一次性获取当前目录下所有的内容，仅限于当前层级
is_dir(path)//判断文件夹

	file		是一个表示文件路径的字符串
	mode	是打开的模式，取值如下：
	r		以只读的方式打开文件，如果文件不存在则报错，如果存在，文件的指针位于文件头
	r+		以读写的方式打开文件，如果文件不存在则报错，如果存在，文件的指针位于文件头
	w		以只写的方式打开文件，如果文件不存则创建，存在则清空，
	w+		以读写的方式打开文件，如果文件不存则创建，存在则清空
	a		以追加的方式打开，如果文件不存则创建，存在不清空，文件的指针位于文件尾
	a+		以追加及写的方式打开，如果文件不存则创建，存在不清空，文件的指针位于文件尾	
	带+号的方式可以进行双重操作，可读可写，文件的指针就影响文件中内容的操作位置，在可视化的图形界面中，那个光标就是指针的一个形象体现。

	'\r'是回车，前者使光标到行首，（carriage return）
	'\n'是换行，后者使光标下移一格，（line feed）
	\r 是回车，return
	\n 是换行，newline
