The extension integrates your Magento 2 store with the [Visa QIWI Wallet](https://corp.qiwi.com/en/business/onlineshops.action) (QIWI Кошелёк) payment service.  
Today QIWI payment service is offered in [8 countries](https://corp.qiwi.com/en/company/world.action): Russia, Kazakhstan, Moldova, Romania, Belarus, United States, Brazil, Jordan.

## Screenshots
### Frontend checkout screen
![](https://mage2.pro/uploads/default/original/2X/5/53e77dd7f992f615a96265579523cbf1db3c0cdb.png)

### Backend settings
![](https://mage2.pro/uploads/default/original/2X/e/e5a6acb10472fb8ebb69cd3e2f181d76742bb618.png)

## How to buy
You can buy it with PayPal [here](https://mage2.pro/t/3669).  
There are [local payment options](http://magento-forum.ru/topic/1003) available to Russia-based customers.

## How to install
### 1. Free installation service
Just order my [free installation service](https://mage2.pro/t/3585).

### 2. Self-installation
```
composer require mage2pro/qiwi:*
bin/magento setup:upgrade
rm -rf pub/static/* && bin/magento setup:static-content:deploy ru_RU en_US <additional locales, e.g.: kk_KZ>
rm -rf var/di var/generation generated/code && bin/magento setup:di:compile
```
If you have some problems while executing these commands, then check the [detailed instruction](https://mage2.pro/t/263).

## Licensing
It is a paid extension, not free.  
You can use it for free for the testing puproses only.  
Please read the [testing policy](https://mage2.pro/t/2590) before installation.

## Support
- [The extension's **forum** branch](https://mage2.pro/c/extensions/qiwi).
- [Where and how to report a Mage2.PRO extension's issue?](https://mage2.pro/t/2034)
- I also provide a **[generic Magento 2 support](https://mage2.pro/t/755)** and [Magento 2 installation service](https://mage2.pro/t/748).

## Want to be notified about the extension's updates?
- [Subscribe](https://mage2.pro/t/2540) to the extension's [forum branch](https://mage2.pro/c/extensions/qiwi).
- Subscribe to my [Twitter](https://twitter.com/mage2_pro) and [YouTube](https://www.youtube.com/channel/UCvlDAZuj01_b92pzRi69LeQ) channels.

## Need a new feature?
I provide the [**customization service**](https://mage2.pro/t/2020) for my payment extensions.

## Need another payment extension for Magento 2?

- «[**2Checkout**](https://mage2.pro/c/extensions/2checkout)» payment extension.
- «[**歐付寶 allPay**](https://mage2.pro/c/extensions/allpay)» payment extension (Taiwan).
- «[**Checkout.com**](https://mage2.pro/c/extensions/checkout-com)» payment extension.
- «[**Dragonpay**](https://mage2.pro/c/extensions/dragonpay)» payment extension (Philippines).
- «[**Ginger Payments**](https://mage2.pro/c/extensions/ginger-payments)» extension (the Netherlands, Belgium).
- «[**iPay88**](https://mage2.pro/c/extensions/ipay88)» payment extension (Malaysia, Indonesia, Philippines, Thailand, Singapore, China).
- «[**iyzico**](https://mage2.pro/c/extensions/iyzico)» payment extension (Turkey).
- «[**Kassa Compleet**](https://mage2.pro/c/extensions/kassa-compleet)» payment extension by ING Bank (the Netherlands).
- «[**Klarna**](https://mage2.pro/c/extensions/klarna)» payment extension (Austria, Denmark, Finland, Germany, Norway, Sweden).
- «[**MercadoPago**](https://mage2.pro/c/extensions/mercadopago)» payment extension (Argentina, Brasil, Chile, Mexico, Venezuela, Colombia, Uruguay, Peru).
- «[**Moip**](https://mage2.pro/c/extensions/moip)» payment extension (Brazil).
- «[**mPAY24**](https://mage2.pro/c/extensions/mpay24)» payment extension (Austria, Germany).
- «[**Omise**](https://mage2.pro/c/extensions/omise)» payment extension (Thailand, Japan).
- «[**PayFort**](https://mage2.pro/c/extensions/payfort)» payment extension (the United Arab Emirates, Egypt, Saudi Arabia, Jordan, Lebanon, Qatar).
- «[**Paymill**](https://mage2.pro/c/extensions/paymill)» payment extension (the European Union).
- «[**PayPal**](https://mage2.pro/c/extensions/paypal)»: an alternative module you can get fast support and customizations for.
- «[**Paystation**](https://mage2.pro/c/extensions/paystation)» payment extension (New Zealand).
- «[**PostFinance**](https://mage2.pro/c/extensions/postfinance)» payment extension (Switzerland).
- «[**QIWI Wallet**](https://mage2.pro/c/extensions/qiwi)» (QIWI Кошелёк) payment extension (Russia).
- «[**Robokassa**](https://mage2.pro/c/extensions/robokassa)» payment extension (Russia).
- «[**SecurePay**](https://mage2.pro/c/extensions/securepay)» payment extension (Australia).
- «[**Spryng**](https://mage2.pro/c/extensions/spryng)» payment extension (the European Union).
- «[**Square**](https://mage2.pro/c/extensions/square)» payment extension (USA, Canada).
- «[**Stripe**](https://mage2.pro/c/extensions/stripe)» payment extension.
- «[**Tinkoff Bank**](https://mage2.pro/c/extensions/tinkoff)» (Тинькофф Банк) payment extension (Russia).
- «[**Yandex.Kassa**](https://mage2.pro/c/extensions/yandex-kassa)» (as known as Yandex.Checkout, Яндекс.Касса) payment extension (Russia, Armenia, Azerbaijan, Belarus, Georgia, Kazakhstan, Kyrgyzstan, Latvia, Moldova, Tajikistan).

## See also my integrations between Magento 2 and a third-party business software (ERP, CRM, accounting, inventory, etc.):
- «[**Microsoft Dynamics 365**](https://mage2.pro/c/extensions/dynamics365)» (an integration with the ERP/CRM software).
- «[**Salesforce**](https://mage2.pro/c/extensions/salesforce)» (an integration with the CRM software).
- «[**Zoho CRM**](https://mage2.pro/c/extensions/zoho-crm)».
- «[**Zoho Inventory**](https://mage2.pro/c/extensions/zoho-inventory)».
- «[**Zoho Books**](https://mage2.pro/c/extensions/zoho-books)» (an accounting software).
- «[**1C:Enterprise**](https://github.com/mage2pro/1c)» (a Russian ERP software, модуль Magento 2 для интеграции с 1С:Предприятие).
- «[**МойСклад**](https://github.com/mage2pro/moysklad)» (a Russian ERP software, модуль Magento 2 для интеграции с МойСклад).

## See also my integrations between Magento 2 and marketplaces
- «[**Etsy**](https://mage2.pro/c/extensions/etsy)» (focused on handmade or vintage items and supplies, as well as unique factory-manufactured items).
- «[**MercadoLibre**](https://mage2.pro/c/extensions/mercadolibre)» (Argentina, Bolivia, Brazil, Chile, Colombia, Costa Rica, Dominican Republic, Ecuador, Guatemala, Honduras, Mexico, Nicaragua, Panama, Paraguay, Peru, Portugal, Salvador, Uruguay, Venezuela).
- «[**Яндекс.Маркет**](https://github.com/mage2pro/yandex-market)» (a Russian marketplace, модуль Magento 2 для интеграции с Яндекс.Маркет).

## See also my other Magento 2 extensions:

- «[**Backend Login with Google Account**](https://mage2.pro/c/extensions/google-backend-login)» (a single sign-on extension for the Magento 2 backend). 
- «[**Blackbaud NetCommunity**](https://mage2.pro/c/extensions/blackbaud-netcommunity)» (an integration with an online fundraising software).  
- «[**Facebook Like & Share**](https://mage2.pro/c/extensions/facebook-like)» (shows the Facebook's «Like» and «Share» buttons on the frontend product pages).
- «[**Facebook Login**](https://mage2.pro/c/extensions/facebook-login)» (a single sign-on extension).
- «[**Login with Amazon**](https://mage2.pro/c/extensions/amazon-login)» (a single sign-on extension). 
- «[**Markdown Editor**](https://mage2.pro/c/extensions/markdown)» (an alternative content editor for the Magento 2 backend).
- «[**Price Format**](https://mage2.pro/c/extensions/price-format)» (set a custom display format for the prices and other currency values: discounts, taxes, sales amounts).
- «[**Russian language package**](https://mage2.pro/c/extensions/ru)» (русификатор для Magento 2).
- «[**Sales Documents Numeration**](https://mage2.pro/c/extensions/sales-documents-numeration)» (use a custom numeration for the sales documents: orders, invoices, shipments, and credit memos).
- «[**Twitter Timeline**](https://mage2.pro/c/extensions/twitter-timeline)» (shows your latest tweets in your store's frontend sidebar).

## Need a custom payment extension?
I provide a [custom payment gateway integration service](https://mage2.pro/t/917).

## Want to get the full rights on my extension?
It is possible: the price depends on a extension and starts from $6.990.  
You will get free lifetime support, updates, and installation service for all your clients.


