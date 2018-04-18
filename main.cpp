#include <phpcpp.h>
#include <iostream>

//演示阶乘
Php::Value pm_factorial(Php::Parameters &params)
{
    int n = (int)params[0];
    if(n < 0 )
        return 0;	
    int i,f=1;
    for(i=1;i<=n;i++)
        f *= i;
    return f;
}

//演示两个数相加
Php::Value pm_add(Php::Parameters &params)
{
    return params[0] + params[1];
}

//演示时间类型操作
void pm_datetype(Php::Parameters &params)
{
    Php::Value time = params[0];
	Php::out <<"param type is : " << time.type() << std::endl;
	Php::out <<"current time is : " << time.call("format","Y-m-d H:i:s") << std::endl;
}

//演示通用的冒泡排序类
Php::Value pm_sort(Php::Parameters &params)
{
	int i,j;
	Php::Value array = params[0];
	Php::Value cmpfunc = params[1];
	int len = array.size();
	Php::Value result,temp;
	for(i=0;i<len;i++){
		for(j=i+1;j<len;j++){
			// Php::Value 类重载了运算符 (), 使得用起来就跟内置函数一样好用
			 result = cmpfunc(array.get(i), array.get(j));
			 if(result.boolValue()){  //如果比较结果为true则冒泡
				temp = array[i];
				array.set(i,array.get(j));
				array.set(j,temp);
			 }
		}
	}
	return array;
}

//测试引用类型参数
void pm_swap(Php::Parameters &params)
{
    Php::Value temp = params[0];
    params[0] = params[1];
    params[1] = temp;
}

/**
 *  告诉编译器get_module是个纯C函数
 */
extern "C" {
    
    /**
     *  本函数在PHP进程一打开就会被访问，并返回一个描述扩展信息的PHP结构指针
     */
    PHPCPP_EXPORT void *get_module() 
    {
        // 必须是static类型，因为扩展对象需要在PHP进程内常驻内存
        static Php::Extension myExtension("myparam", "1.0.0");
        
        //这里可以添加你要暴露给PHP调用的函数
		myExtension.add<pm_factorial>("pm_factorial", {
            Php::ByVal("a", Php::Type::Numeric)
		});

		myExtension.add<pm_add>("pm_add", {
            Php::ByVal("a", Php::Type::Float),
            Php::ByVal("b", Php::Type::Float)
		});
		
		myExtension.add<pm_datetype>("pm_datetype", {
			/****
				"time" : 表示参数名称，用于返回的异常信息中使用
				"DateTime"：参数对象的类名
				true ：表示该参数是必须的
			****/
			Php::ByVal("time", "DateTime", true)
		});
		
		myExtension.add<pm_sort>("pm_sort", {
            Php::ByVal("a", Php::Type::Array),
            Php::ByVal("b", Php::Type::Callable)
		});
		
		myExtension.add<pm_swap>("pm_swap", {
            Php::ByRef("a", Php::Type::Numeric),
            Php::ByRef("b", Php::Type::Numeric)
        });
		
        // 返回扩展对象指针
        return myExtension;
    }
}
