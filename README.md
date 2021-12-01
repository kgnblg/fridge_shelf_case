# Fridge & Shelf (Dolap & Raf) Case

Yazmış olduğum kodda framework, library ve paket yöneticisine izin verilmediği için Composer, Laravel veya başka bir kütüphane, paket yöneticisi veya frameworkden faydalanmadım.

Autoloading için Composer kullanılabilirdi, ancak paket yöneticisi kullanımına izin verilmediği için bütün dosyaları elle include ettim.

Gönderilen case'de sanallaştırma ile ilgili bir bilgi bulunmadığı için Docker dosyasını da projeye ekledim. Normalde PHP FPM + NginX kullanmak daha mantıklı bir çözümdü, ancak çok fazla detaya girmek istemediğim için Dockerfile'da PHP 7.4 Apache Image'i kullandım.

## Kullanım

Projeyi Docker ile çalıştırmak için aşağıdaki adımları izleyin.

```
docker build -t fridge_shelf_case:1.0.0 .
```

```
docker run -d -p 80:80 fridge_shelf_case:1.0.0
```

Yukarıdaki komutlardan sonra `localhost:80` adresini ziyaret ettiğinizde bütün Test Case'lere ait çıktıları görmeniz gerekiyor.

## Dosya & Dizin Yapısı

- **src/**

-- **AbstractFridge.php** Farklı Fridge sınıfları oluşturmak için kullanılabilecek Fridge Abstract Class'ı. İçinde buzdolabı kapısının açılıp & kapanması, içecek eklenmesi & çıkarılması ve raf eklenip çıkarılması ile ilgili işlemleri yerine getirecek fonksiyonlar bulunmaktadır.

-- **AbstractShelf.php** Farklı Shelf sınıfları oluşturmak için kullanılabilecek Shelf Abstract Class'ı. İçinde Shelf yönetimi ile ilgili olarak içeceklerin eklenmesi & çıkarılması, doluluk & boşluk durumunun takibi ve güncel içecek durumunun alınması için gerekli fonksiyonlar bulunmaktadır.

-- **Fridge.php** Abstract Fridge sınıfından türetilmiş Fridge sınıfı.

-- **Shelf.php** Abstract Shelf sınıfından türetilmiş Shelf sınıfı.

- **tests/**

-- **AbstractTest.php** Farklı test sınıflarının aynı düzen içinde olabilmesi için yazılmış Test Abstract Class'ı. Herhangi bir test aracına izin verilmediği için, içinde eşitlik kontrolüne bakan basit bir fonksiyon ve testlerin yürütülmesi için yazılmış `run` adlı abstract fonksiyon bulunmaktadır.

-- **FridgeTestCase.php** İçinde 10 adet test fonksiyonu bulunmaktadır. Soruda Dolap (Fridge) için verilen gereksinimleri kontrol eder.

-- **ShelTestCase.php** İçinde 6 adet test fonksiyonu bulunmaktadır. Soruda Raf (Shelf) için verilen gereksinimleri kontrol eder.

- **Dockerfile** PHP 7.4 Apache Image'ine sahip Dockerfile. PHP FPM + NginX için 2 farklı konteyner gerekeceği için Apache tercih ettim. PHP FPM + NginX ve Multistage build kullanılarak boyutu daha düşük Image'ler elde etmek mümkün.

- **index.php** Test case'lerini çalıştırır.

- **use_case.php** Soruda istenen ve kodun kullanımını gösteren örnek.

## Fonksiyonlar

| Sınıf          |Fonksiyon                      |Açıklama                               |
|----------------|-------------------------------|---------------------------------------|
|AbstractFridge  |openDoor()                     |Dolabın kapağını açar.                 |
|AbstractFridge  |closeDoor()                    |Dolabın kapağını kapatır.              |
|AbstractFridge  |isDoorOpened()                 |Dolabın kapağı açıksa `true` döner.    |
|AbstractFridge  |isDoorClosed()                 |Dolabın kapağı kapalıysa `true` döner. |
|AbstractFridge  |addShelf()                     |`AbstractShelf` nesnesini eğer dolap limitleri yeterliyse raf olarak dolaba ekler.       |
|AbstractFridge  |removeShelf()                  |En son eklenen rafı, dolaptan çıkarır. |
|AbstractFridge  |getShelfAmount()               |Dolapta bulunan raf sayısını geri döndürür. |
|AbstractFridge  |getFridgeCapacity()            |Dolabın içecek kapasitesini döndürür.  |
|AbstractFridge  |isEmpty()                      |Dolapta hiç içecek yoksa `true` döner. |
|AbstractFridge  |isFull()                       |Dolapta tam kapasite doluysa `true` döner. |
|AbstractFridge  |addDrink()                     |Dolapta yeterli yer varsa dolaba içecek ekler ve `true` döner. Dolapta içecek eklemek için yer yoksa `false` döner. |
|AbstractFridge  |removeDrink()                  |Dolapta en az bir içecek varsa ve bu içecek başarıyla dolaptan çıkarıldıysa `true` döner. Dolap boşsa `false` döner. |
|AbstractShelf   |getDrinkAmount()               |Raftaki içecek miktarını verir. |
|AbstractShelf   |isEmpty()                      |Rafta hiç içecek yoksa `true` döner. |
|AbstractShelf   |isFull()                       |Raf tamamen doluysa `true` döner. |
|AbstractShelf   |addDrink()                     |Raf içecek eklemek için yer varsa ve içecek eklendiyse `true` döner. Rafta yer yoksa `false` döner. |
|AbstractShelf   |removeDrink()                  |Rafta en az bir içecek varsa ve içecek raftan alındıysa `true` döner. Raf boşsa `false` döner. |
|AbstractTest    |run()                          |Testi yürütmek için çağırılan abstract fonksiyon. |
|AbstractTest    |assertEqual()                  |Testin geçip geçmediğini verilen iki değişkenin eşitliğine bakarak ekranda belirten fonksiyon. |
