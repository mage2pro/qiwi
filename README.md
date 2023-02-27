The module integrates a Magento 2 based webstore with the [Visa QIWI Wallet](https://corp.qiwi.com/en/business/onlineshops.action) (QIWI Кошелёк) payment service.  
Today QIWI payment service is offered in [8 countries](https://corp.qiwi.com/en/company/world.action): Russia, Kazakhstan, Moldova, Romania, Belarus, United States, Brazil, Jordan.  
The module is **free** and **open source**.

## Screenshots
### Frontend checkout screen
![](https://mage2.pro/uploads/default/original/2X/5/53e77dd7f992f615a96265579523cbf1db3c0cdb.png)

### Backend settings
![](https://mage2.pro/uploads/default/original/2X/e/e5a6acb10472fb8ebb69cd3e2f181d76742bb618.png)

### Some additonal screenshots:

- [The extension settings](https://mage2.pro/t/topic/4444).
- [How is a payment's description shown on the **QIWI Wallet payment page**?](https://mage2.pro/t/topic/4481)
- [How is a payment's description shown in a **customer's QIWI Wallet account**?](https://mage2.pro/t/topic/4482)
- [How is a payment's description shown in the **QIWI Wallet merchant interface**?](https://mage2.pro/t/topic/4483)

## How to buy
You can buy it with PayPal [here](https://mage2.pro/t/3669).  
There are [local payment options](http://magento-forum.ru/topic/1003) available to Russia-based customers.

## How to install
[Hire me in Upwork](https://upwork.com/fl/mage2pro), and I will: 
- install and configure the module properly on your website
- answer your questions
- solve compatiblity problems with third-party checkout, shipping, marketing modules
- implement new features you need

### 2. Self-installation
```
bin/magento maintenance:enable
rm -f composer.lock
composer clear-cache
composer require mage2pro/qiwi:*
bin/magento setup:upgrade
bin/magento cache:enable
rm -rf var/di var/generation generated/code
bin/magento setup:di:compile
rm -rf pub/static/*
bin/magento setup:static-content:deploy -f ru_RU en_US <additional locales, e.g.: kk_KZ>
bin/magento maintenance:disable
```

## How to update
```
bin/magento maintenance:enable
composer remove mage2pro/qiwi
rm -f composer.lock
composer clear-cache
composer require mage2pro/qiwi:*
bin/magento setup:upgrade
bin/magento cache:enable
rm -rf var/di var/generation generated/code
bin/magento setup:di:compile
rm -rf pub/static/*
bin/magento setup:static-content:deploy -f ru_RU en_US <additional locales, e.g.: kk_KZ>>
bin/magento maintenance:disable
```