### 用原生PHP建立PHP-MVC-框架的練習

- 參考
   [Build PHP MVC Framework](https://www.youtube.com/playlist?list=PLLQuc_7jk__Uk_QnJMPndbdKECcTEwTA1)

- 練習理由
   - 該項目採用原生PHP來開發簡化的類Laravel或SymphonyMVC結構，練習該項目可以來：
     * 增加對框架底層運作的認識
     * 練習原生PHP語法

### 下載後啟動

- Github下載
  * `git clone https://github.com/yayajojo/php-mvc-framework.git`
  * `cd php-mvc-framework`
- Composer下載依賴的套件
  * `composer install`
  *  改檔案名並設定.env檔中環境變數 `mv .env.example  .env`
- 生成mirgations和users資料表 
  `cd ..`
  `php migrations.php`
- 使用PHP內建開發伺服器，開啟並監聽8001埠號
  * `cd public`
  * `php -S localhost:8001 index.php`  
- 開啟網路瀏覽器進到首頁
  * `http://localhost:8001`

###  框架可共用部分

- 封裝成套件[mayjhao/php-mvc-framework-core](https://packagist.org/packages/mayjhao/php-mvc-framework-core)
- 主要實作：
  * 資料庫
      1. class Database 負責：數據庫連接與數據遷移（migration）
      2. abstract class DbModel實作數據存儲（save）與找尋（findOne）供子類繼承
  * 例外
      1. 例外皆繼承PHP提供的Exception類別
      2. 實作403/404例外
  * 表單
      1. 各種表單元件的抽想類別
  * 中介軟體
      1. abstract class BaseMiddleware，子類需實作execute抽象方法
      2. 實作 class AuthMiddleware判斷路徑是否需要登入才能拜訪
  * 應用軟體：
      1. 負責在每次請求時重新生成所需的類別實體，如路由、請求、回應等
      2. 啟動路由去解析URL路徑與請求方法來啟動對應的控制器方法
      3. 在登錄後於session中存取該使用者id 
  * 控制器
      1. abstract class Controller實作註冊/取得使用的中介軟體方法
  * 模型
      1. abstract class Model實作驗證規則，子類需實作rules抽象方法
  * 請求
      1. 解析請求進來時的方法/端點/數據
  * 回應
      1. HTTP回應狀態碼設置
      2. 轉向
  * 路由
      1.  將index.php所定的路徑方法與對應的控制器方法儲存起來
      2.  解析URL路徑與請求方法來啟動對應的控制器方法
  * Session
      1. 存取該使用者id
      2. 儲存快閃訊息，在另一個請求來時會被移除

### 框架的資料夾配置
-  控制器（controllers）：從控制器母類延伸的子類
-  表單（fields）：從表單提供的母類所延伸的子類
-  數據遷移（migrations）：於php migrations.php時生成對應的資料表
-  模型（models）：從模型母類延伸的子類，實作該子類需要的數據的驗證規則
-  視圖（views）：前端畫面
-  公開（public）：index.php中設定路徑與對應的控制器方法


