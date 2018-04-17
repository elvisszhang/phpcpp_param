#include <phpcpp.h>

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
		
        // 返回扩展对象指针
        return myExtension;
    }
}
