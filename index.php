<?php
// include_once("./app/views/main.php");
?>
<!doctype html > 
< html  lang = "fr" > 
<head> 
  < meta  charset = "utf-8" /> 
  < meta  name = "viewport"  
  content = " width = device-width , initial-scale=1 " / > <title> تسجيل الدخول </title>

  <!-- Bootstrap 5 --> 
  < link  href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"  rel = "stylesheet" >

  <!-- CSS مخصص --> 
  < link rel  = " stylesheet"  href = "assets 
/ css/login.css" > </head>

< body  class = "bg-light" > 
  < div  class = "container py-5" > 
    < div  class = "row justify-content-center align-items-center min-vh-100" > 
      < div  class = "col-12 col-md-10 col-lg-8 col-xl-7" > 
        < div  class = "card shadow-sm border-0 overflow-hidden" > 
          < div  class = "row g-0" >

            <!-- الجانب الأيسر (العلامة التجارية) --> 
            < div  class = "col-md-5 d-none d-md-flex login-brand p-4" > 
              < div  class = "w-100" > 
                < h2  class = "fw-bold text-white mb-2" > متجر إلكتروني </ h2 > 
                < p  class = "text-white-50 mb-4" >
                  قم بالاتصال للوصول إلى درجتك وأوامرك.
                </p>​​

                < ul  class = "text-white-50 Small ps-3 mb-0" > 
                  < li > منتجات الكتالوج </ li > 
                  < li > متابعة الأوامر </ li > 
                  < li > عميل Espace آمن </ li > 
                </ ul > 
              </ div > 
            </ div >

            <!-- الجانب الأيمن (النموذج) --> 
            < div  class = "col-md-7" > 
              < div  class = "card-body p-4 p-lg-5" > 
                < div  class = "d-flex align-items-center justify-content-between mb-3" > 
                  < h1  class = " h4 fw 
                  -bold mb-0" > Se connecter </h1> < span class  = " badge text-bg-primary " > Client </span> </div>
                

                < p  class = "text-muted mb-4" >
                  أدخل بريدك الإلكتروني وكلمة مرورك.
                </p>​​

                < form  action = "#"  method = "post"  novalidate > 
                  <!-- البريد الإلكتروني --> 
                  < div  class = "mb-3" > 
                    < label  for = "email"  class = "form-label" > البريد الإلكتروني </ label > 
                    < input 
                      type = "email" 
                      class = "form-control" 
                      id = "email" 
                      name = "email" 
                      
                      
                    placeholder = " مثال: tayeb@email.com" required 
                    > < !-- رسالة خطأ اختيارية --> 
                    < div  class = "invalid-feedback" > يرجى إدخال بريد إلكتروني صحيح. </ div > 
                  </div>

                  <!-- كلمة المرور --> 
                  < div  class = "mb-3" > 
                    < label  for = "password"  class = "form-label" > كلمة المرور </ label > 
                    < div  class = "input-group" > 
                      < input 
                        type = "password" 
                        class = "form-control" 
                        id = "password" 
                        name = "password" 
                        placeholder = "********" 
                        required 
                        minlength = "6" 
                      > 
                      < button  class = "btn btn-outline-secondary"  type = "button"  id = "togglePassword" >
                        عرض المزيد
                      </ Button > 
                      < div  class = "invalid-feedback" > كلمة المرور المطلوبة (6 أحرف على الأقل). </ div > 
                    </ div > 
                  </ div >

                  <!-- تذكر + نسيت --> 
                  < div  class = "d-flex justify-content-between align-items-center mb-4" > 
                    < div  class = "form-check" > 
                      < input  class = "form-check-input"  type = "checkbox"  value = "1"  id = "remember"  name = "remember" > 
                      < label  class = "form-check-label"  for = "remember" >
                        Se remember de moi
                      </label> </div> 
                    <a href="#" class="link-primary small text-decoration-none"> كلمة المرور منسية ؟ </a> </div>​​​​
                    ​​​​​​​​​  
                  

                  <!-- إرسال --> 
                  < button  type = "submit"  class = "btn btn-primary w-100 py-2" >
                    اتصال
                  </button>​​

                  < div  class = "text-center mt-4" > 
                    < span  class = "text-muted" > هل لا تستطيع الحساب؟ </ span > 
                    < a  href = "#"  class = "link-primary text-decoration-none fw-semibold" > إنشاء حساب </ a > 
                  </ div >

                  
                  < ! -- رابط الإدارة ( اختياري ) -- > < div  class = 
                    " text - center mt - 2 " > <a href="#" class="small text-muted text-decoration-none"> دخول   المدير </a> 
                  </div> </form> </div> </div>​
                
              
            

          </ div > 
        </ div >

        < p  class = "text-center text-muted small mt-4 mb-0" >
          © 2026 المتجر الإلكتروني الإلكتروني. جميع الحقوق محفوظة.
        </ p > 
      </ div > 
    </ div > 
  </ div >

  
  < !-- Bootstrap JS --> < script src  = " https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" > </script>

  
  < ! -- اختياري: إظهار / إخفاء كلمة المرور --> <script> const btn = document.getElementById ( ' togglePassword ' );
     const input = document.getElementById ( 'password' );
    

    btn.addEventListener ( 'click' , () => {
       const isPassword = input.getAttribute ( ' type ' ) === 'password' ;
      مدخل. setAttribute ( 'type' , isPassword ? 'text' : 'password' );
      btn. محتوى النص = كلمة المرور؟ 'قناع' : 'مظهر' ;
    });
  </script> </body> 
</html>​​​
​​​
