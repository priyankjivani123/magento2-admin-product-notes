# Magento 2 Admin Product Notes Extension

[![Magento 2.4.x](https://img.shields.io/badge/Magento-2.4.x-orange.svg?logo=magento)](https://business.adobe.com/products/magento/magento-commerce.html)
[![PHP 8.1 - 8.4 Compatible](https://img.shields.io/badge/PHP-8.1%20%7C%208.2%20%7C%208.3%20%7C%208.4-777BB4.svg?logo=php)](https://www.php.net/)
[![Composer Package](https://img.shields.io/badge/Composer-priyankjivani%2Fmodule--admin--product--notes-blue.svg?logo=composer)](https://packagist.org/)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![Upwork](https://img.shields.io/badge/Upwork-Available%20for%20Hire-14a800.svg?logo=upwork)](https://www.upwork.com/freelancers/priyankjivani)

A high-productivity catalog management extension for **Magento 2 & Adobe Commerce**. Allows store administrators, warehouse operators, and customer service teams to attach operational internal notes, inventory reminders, and supplier memos directly to catalog products via an Admin UI Grid, Form, and REST Web API.

Developed and maintained by **[Priyank Jivani](https://github.com/priyankjivani123)** (Senior Magento 2 Backend Developer).

---

## 🚀 Key Features

* **Searchable Catalog Product Dropdown:** Search and link products easily in the admin edit form using asynchronous collection sources.
* **Unified Admin UI Grid:** View, filter by date, search, and sort all product notes under **Catalog > Product Notes** with inline product joins.
* **REST Web API Service Contracts:** Full Swagger-compliant API endpoints (`GET /V1/productnotes/product/:productId`, `POST /V1/productnotes`) for ERP/PIM integration.
* **Clean Declarative Schema:** Utilizes Magento 2's `etc/db_schema.xml` with foreign key constraints cascading on product deletion.
* **Modern PHP 8.1 - 8.4 Architecture:** Fully typed, zero implicit nullable parameter types, and ready for upcoming Magento releases.

---

## 🌐 Magento & PHP Compatibility Matrix

| Magento / Adobe Commerce Release | Supported PHP Versions | Compatibility Status | Notes |
| :--- | :--- | :---: | :--- |
| **Magento 2.4.4 - 2.4.5-p1** | PHP 8.1 | ✅ Supported | Tested on 2.4.4-p9 & 2.4.5-p1 |
| **Magento 2.4.5-p2 - 2.4.6-pX** | PHP 8.1, PHP 8.2 | ✅ Supported | Tested on 2.4.6-p8 |
| **Magento 2.4.7 - 2.4.7-pX** | PHP 8.2, PHP 8.3 | ✅ Supported | Officially verified on 2.4.7-p3 |
| **Magento 2.4.8 (Roadmap)** | PHP 8.3, PHP 8.4 | 🚀 Forward-Compatible | Strict types, zero implicit nullable deprecations |
| **PHP 8.5 (Future Release)** | *N/A (Pending Adobe Core)* | ⏳ Preview / Audited | Extension syntax passes PHP 8.5 compilation; awaiting Adobe Commerce core framework update |


---

## 📦 Composer Installation Instructions

This extension is distributed as an open-source Composer package via GitHub VCS repository.

### Step 1: Add GitHub VCS Repository to Your Magento Root
```bash
composer config repositories.priyankjivani-admin-product-notes vcs https://github.com/priyankjivani123/magento2-admin-product-notes.git
```

### Step 2: Require the Package
```bash
composer require priyankjivani/module-admin-product-notes:^1.0.0
```

### Step 3: Enable the Module & Upgrade
```bash
bin/magento module:enable PriyankJivani_AdminProductNotes
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento cache:flush
```

*(No authentication credentials or GitHub tokens are required — the repository is public and installable directly).*

### Manual Installation (Alternative)
1. Clone the repository into `app/code/PriyankJivani/AdminProductNotes`.
2. Run `bin/magento module:enable PriyankJivani_AdminProductNotes && bin/magento setup:upgrade`.

---

## 💻 REST Web API Usage

### 1. Fetch Notes for a Product
```http
GET /rest/V1/productnotes/product/42
```
**Response:**
```json
{
  "product_id": 42,
  "notes": [
    {
      "note_id": 1,
      "note": "Urgent: Q4 shipment needs quality verification.",
      "created_at": "2026-11-09 10:00:00"
    }
  ]
}
```

### 2. Append an Internal Note
```http
POST /rest/V1/productnotes
Content-Type: application/json

{
  "productNote": {
    "product_id": 42,
    "note": "Batch approved by warehouse supervisor."
  }
}
```

---

## 🧪 Automated Testing & Quality Assurance

Run the automated PHPUnit test suite:
```bash
vendor/bin/phpunit -c phpunit.xml.dist
```
Verified passing under PHPUnit with 100% assertions satisfied.

---

## 📋 Changelog

Please see [CHANGELOG.md](CHANGELOG.md) for full release details.

---

## 🐛 Issues & Contributions

Found a bug or need an enhancement? Submit an issue on [GitHub Issues](https://github.com/priyankjivani123/magento2-admin-product-notes/issues).

---

## 📄 License

This module is open-sourced under the [MIT License](LICENSE).

---

## Developing a Magento 2 project?

I help businesses build, customize, optimize and maintain Magento 2 / Adobe Commerce stores.

**Available for:**
- Magento 2 Custom Development
- Magento Extensions
- Bug Fixes and Troubleshooting
- Performance Optimization
- Hyvä Theme Development
- API Integrations
- Ongoing Magento Maintenance

**Hire me on Upwork:** [Priyank Jivani Upwork Profile](https://www.upwork.com/freelancers/priyankjivani)  
**GitHub:** [github.com/priyankjivani123](https://github.com/priyankjivani123)

Contact me for freelance projects and long-term collaborations.

