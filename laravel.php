<?php
cmd: php artisan serve //挂起laravel知道的web服务器
cmd: php artisan make:controller IndexController//创建index控制器
laravel dd()==tp5 dump();die;
>>>//控制器创建在app/http/Controller/[前后台]IndexController
>>>//bootstrap目录，laravel启动目录
>>>//config目录，项目的配置目录
>>>//database目录，数据迁移目录
>>>//public目录，项目的入口文件和系统的静态资源目录（css,img,js,uploads）
>>>//视图创建在resources/views里已.blade.php结尾,注意是php文件里面写的html
>>>//临时缓存文件及日子文件 storage
>>>//第三方文件 vendor
>>>//.env 配置文件会被config引入
>>>//路由 routes/web.php
	Route::get('/',function(){return view('index')})//主页显示
	Route::get('home',function(){return 'hello home'})//www.laravel.com/home'
	Route::match(['psot','get','put'],'admin/index','admin/IndexController@index')//控制器@方法名
	Route::match(['psot','get','put'],'admin/index',function(){echo '多种求情方式都可以访问'})
	Route::any('/index',function(){echo '任何请求方式都可以访问'})
	Route::get('index/{id}',function($id){echo '参数用{}'>$id;})->where(['id'=>'\d+']);//正则控制参数
	Route::get('index/{id}/{name}','admin/IndexController@index')->where(['id'=>'\d+','name'=>'[a-z]'])//正则参数
	Route::group(['prefix' => 'admin'],'namesoace=Admin',function(){Route::get('users', function (){});});//路由分类
>>>//接收用户输入信息,要use类：use Illuminate\Support\Facades\Input
Input::all()//获取全部数据
Input::get('name')//只接受一个值,name的值
Input::only(['name,id'])//获取指定的信息
Input::except(['name'])//获取除name之外的信息
>>>//Db数据库操作,需要先引入Db, use Db;     返回的对象是基类的对象,模型类返回的是模型对象
Db::table('表名')->insert([])//添加一条或多条数据 返回boolen
Db::table('表名')->insertGetId()//添加一条数据返回受影响ID
DB::table('表名')->where('id',1)->update(['name'=>'李白','age'=>12]);//更新数据,where(条件)
DB::table('users')->increment('votes');*****未知
DB::table('users')->increment('votes', 5);//更新自增长5
DB::table('users')->decrement('votes');*****未知
DB::table('users')->decrement('votes', 5);//更新自减5
Db::table('表名')->get();//获取全部数据,类似于select * from,返回集合对象
new stdClass()->name=''//类似于TP3 new create()->name=''
Db::table('表名')->where()->first()//取一条数据
Db::table('表名')->where('id',)->where()->get()//并且	返回对象,对象里一位数组   取值$result->name
Db::table('表名')->where()->orWhere()->get()//或者  返回对象,对象里二维数组
Db::table('表名')->where(function($re){$re->where();$re->orWhere();})->get()//闭包写法
Db::table('表名')->orderBy('id','desc')->get();//排序  类似于TP5  order
DB::table('member')->where('id','1')->value('name')//value  具体获取某个值
$users = DB::table('users')->select('name', 'email')->get();//select 获取某些字段的值 类似于TP5 filed
Db::table('表名')->offset('偏移量')->limit('每页显示多少')->get()//分页
Db::table('表名')->delete('主键条件')//主键删除  返回受影响行数
Db::table('表名')->where()->delete()//条件删除
Db::statement($sql)//执行增删改语句  返回bool
Db::select($sql)//执行查询语句   返回数组里面是对象集合  
>>>//视图  视图创建在resources/views里已.blade.php结尾,注意是php文件里面写的html,建议名字小写
view('文件名',['name'=>'12']);'模版'{{$name or '默认值'}}
$url='www.baidu.com'  view('html名',['url'=>$url]) {!!$url!!}//解析成html代码
view('html名',['time'=>time()]) {data('Y-m-d H:i:s',$time)}//模版函数使用
@foreach ($data as $v) {{$v->id}}{{$v->name}} @endforeach  //模版遍历对象
@foreach ($data as $v) {{$v['id']}}{{$v['name']}} @endforeach  //模版遍历数组
@if()elseif()else()@endif
view('admin.goods.index')//多分组加载视图
{{asset('admins')}    //admins是public目录下面的文件夹，用在引入的资源路径（js,css,img）
{{url('admin/info')} // 是routes/web.php 文件中的路由，用在链接中，以及表单提交地址。
{{csrf_filed()}}//生成隐藏域+令牌,防止跨站提交  post提交方式
{{csrf_filed()}}//生成令牌字符串   ajax的post
laravel\app\Http\Middleware\VerifyCsrfToken.php//csrf验证指定排除不需要带令牌的url(字符串)  
>>>//
function(Request $obj)//tp5 一样的依赖注入
$obj->all()//获取全部的提交信息  类似tp5的input();
$obj->input('name')//获取某个具体值
$obj->method()//查看请求方式
$obj->only([])//接受指定参数
$obj->isMethod('post')//判断请求方式  类似tp5 isPost
$obj->file()//获取上传文件信息
$obj->has('name')//提交的信息是否有name
$obj->except([])//排除不要的信息
>>>//模型类,跟控制器类一样放在创建在laravel\app\Http里可创建models目录   表名(首驼峰).php
	php artisan make:model Admin
	use Illuminate\Database\Eloquent\Model;//引入父类,
	vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php//model真实路径
	protected $table='admin'//必须指定表名,不要前缀
	protected $primaryKey='id'//指定id,默认id可以不写
	protected $timestamps=false; //定义$timestamps属性，值是false,如果不设置为false，则默认会操作表中的created_at和updated_at字段,我们表中一般没有这两个字段，所以设置为false,表示不要操作这两个字段。
	protected$fillable=['name','password']//定义$fillable属性，表示表单提交时允许插入到数据库的字段信息。
	protected $guarded = ['price'];//排除的字段跟$fillable正好相反
>>>//   模型类     返回的对象是模型对象,Db类返回的是基类的对象
	use app\Admin; $obj=new Admin(); $obj->name=''   $obj->save()//类似tp   方法1  返回bool
	Admin::create($data);//	入库方法2   返回一个模型对象(当前更新记录封装的一个模型对象)
	Admin::find()//主键条件查询返回数据封装的模型对象
	Admin::where('id','>',4)->first();//where条件查询,查询一条,返回数据封装的模型对象
	Admin::where()->get(['可以指定字段'])//带条件查询多条
	Admin::where('id','>',2)->get([' 列 1',' 列 2']);//字符串选列
	Admin::where('id','>',2)->select('title','content')->get(); //字符串选列
	Admin::where('id','>',2)->select( [' 列 1',' 列 2'] )->get(); //字符串选列
	Admin::all(['可以指定字段'])//查询所有  返回一个集合对象(对象->数组->成员对象)
	Admin::where()->value('name')//获取指定的值和Db类获取方式一样  返回字符串值
	Admin::pluck('字段名')//获取指定某一列的值  返回集合对象(对象->数组)
	Admin::pluck('字段名','id')//返回id为key的对象集合的关联数组   id写后面   也是一个对象集合(对象->数组)
	return view('admin/index',compact('data'))//类似Db  view('admin/index',['data'=>$data])
	<a href="{{url('admin/del/'.$v->id)}}">删除</a>
	<a href="admin/del/{{$v->id}}">删除</a>
>>>//更新
	Admin::find($obj->input('id'));//获取要修改的信息
	$obj->name='';$obj->save()//修改
	return ridirect('admin/index')//成功跳转
	return back();//失败从哪来到 哪去
>>>// 删除
	$obj->delete($obj->input('id'));//返回bool
	Admin::destory($obj->input('id'));//返回受影响行数,参数可为数组
>>>	//复杂查询
	Admin::where('id','>',2)->select([‘id’,’name’])->orderBy('id','desc')->get();//排序查询：
	Admin::where('id','>',2)->orderBy('id','desc')->skip(2)->take(1)->get();//限制条目查询：
	Admin::where('id','>',2)->orderBy('id','desc')->offset(2)->limit(1)->get();//限制条目查询：
>>>//聚合函数
	Admin::count()/sum()/avg()/max()/min()
	Admin::where('mg_id','>',3)->count();
	Admin::where('mg_id','>',3)->sum('mg_id');
	Admin::where('mg_id','>',3)->avg('mg_id');
	Admin::where('mg_id','>',3)->max('mg_id');
	Admin::where('mg_id','>',3)->min('mg_id');
>>>//软删除
	alter table member add deleted_at timestamp  null;//加字段   sql语句
	use Illuminate\Database\Eloquent\SoftDeletes;  //模型类设置
	use SoftDeletes;protected $dates = ['deleted_at'];//指定软删除字段名  模型类设置
	Admin::all()===Admin::where('deleted_at','null')//自动查询deleted_at=null的数据
	Admin::withTrashed()->get();//查询包括软删除的数据
	Admin::onlyTrashed()->get();//只查询被软删除的数据
>>>//软删除恢复
	$info = Admin::withTrashed()->find(4);$info->restore();//先找到再恢复
	Admin::withTrashed()->where('id','>',1)->restore();	//恢复多个模型
	Admin::withTrashed()->restore();//恢复所有模型
>>>//强制删除
	$post = Admin::find(6);$post->forceDelete();//先找到再删除
>>>//分页
	Admin::paginate('每页显示的记录数')	//先在控制器index方法中获取数据
	{{$data->render()}};//模版页代码 分页字符串
	{{$data->links('自定义的分页文件')}};//模版页代码 分页字符串
	{{$data->total()}};//模版页代码 总记录数
	{{$data->currentPage()}};//模版页代码 当前页
	laravel\vendor\laravel\framework\src\Illuminate\Pagination\resources\views\default//&laquo;改成上一页
>>>//文件上传  public目录下创建upload目录
	$file=$request->file('images');//获取上传的文件，
	$request->hasFile('images');//验证文件是否存在  返回bool
	$request->file('images')->isValid()//验证文件是否上传成功
	$file->getClientOriginalExtension()//返回上传文件的扩展名称
	$file->getClientOriginalName()//返回上传文件的真实名称
	$file->getClientSize();//返回上传文件的大小
	$file->move('./uploads/',$filename);//移动到
>>>//自动验证
	value="{{old('name')}}"//表示验证失败后，为了更好的用户体验，还要显示出旧数据。
	value="{{old('password')}}"//表示验证失败后，为了更好的用户体验，还要显示出旧数据
	email://验证邮箱是否合法
	confirmed://验证两个字段是否相同，如果验证的字段是password,则必须输入一个与之匹配的password_confirmation字段,
	integer://验证字段必须是整型
	ip://验证字段必须是IP地址
	numeric:// 验证字段必须是数值
	max://value 验证字段必须小于等于最大值，和字符串，数值，文件字段的size规则一起使用。
	min://value 验证字段的最小值，对字符串、数值、文件字段而言，和size规则使用方式一致。
	string// 验证字段必须是字符串
	unique://unique:表名，字段，需要排除的ID
	$this->validate($request,[规则]);//验证 验证错误就直接返回上一层
	//摸板输出验证错误信息
	@if (count($errors) > 0)<div class="alert alert-danger"><ul>
            @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
    laravel\resources\lang\en\validation.php//语言包,需要中文提示可以在这里修改
    bcrypt();//laravel封装的加密函数比md5()强大
>>>//后台验证
'username'=>'required|min:2|max:16|regex:/^[a-zA-Z1-9\x{2e80}-\x{9FFF}]*$/u'//字母数字汉字
'code'=>'required|size:4|captcha'//验证验证码  composer下载的
Auth::guard('admin')->attempt($data,$request->has('online'))//自带封装验证账号密码  login方法内验证
$request->has('online')//判断表单里面是否有online字段提交，
return back('admin/login')->withErrors(['error'=>''])//withErrors是把错误信息给添加到$errors对象里面，
{{Auth::guard('admin')->user()->username}}  {{Auth::guard('admin')->user()->id}}//登录成功后，显示用户名  模版
Route::get('logout','AdminController@logout');//第二步：在退出按钮添加链接
Auth::guard('admin')->logout();//退出 , 第一步：建立退出登录的路由  logout方法内

