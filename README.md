# Magento 2 Admin Product Notes Extension

[![Magento 2.4.x](https://img.shields.io/badge/Magento-2.4.x-orange.svg?logo=magento)](https://business.adobe.com/products/magento/magento-commerce.html)
[![PHP 8.1 | 8.2 | 8.3](https://img.shields.io/badge/PHP-8.1%20%7C%208.2%20%7C%208.3-777BB4.svg?logo=php)](https://www.php.net/)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)
[![Upwork Top Rated](https://img.shields.io/badge/Upwork-Available%20for%20Hire-green.svg?logo=upwork)](https://www.upwork.com/freelancers/priyankjivani)

A productivity and back-office management extension for **Magento 2 & Adobe Commerce**. Enables store managers, customer support agents, and catalog teams to attach internal operational notes, restocking alerts, warehouse reminders, or merchant memos directly to catalog products.

Developed and maintained by **[Priyank Jivani](https://github.com/priyankjivani123)** (Senior Magento 2 Backend Developer).

---

## 🚀 Key Features

* **Searchable Product Dropdown**: Select products directly in the admin form using a live searchable dropdown selector populated via Catalog collection factories.
* **Dedicated Admin Grid**: View all notes in a unified UI Component listing table with sorting, date filtering, pagination, and inline product name joins.
* **REST Web API Integration**: Exposes complete API endpoints (`/V1/productnotes`) to query and manage product notes from ERPs, external warehouse systems, or PIMs.
* **Service Contracts & Data Models**: Adheres to Magento 2 repository architecture (`ProductNotesRepositoryInterface`, `ProductNotesInterface`).
* **Clean Database Lifecycle**: Uses Magento declarative database schema (`etc/db_schema.xml`) with proper foreign key cascades on catalog product entities.

---

## 🛠 Technical Requirements

| Stack Component | Requirement |
| :--- | :--- |
| **Magento / Adobe Commerce** | 2.4.4+ (Compatible with 2.4.6, 2.4.7+) |
| **PHP** | 8.1, 8.2, 8.3 |
| **Composer** | 2.x |

---

## 📦 Installation Instructions

### Option 1: Composer Installation (Recommended)

```bash
composer require priyank/module-admin-product-notes
bin/magento module:enable Priyank_ProductNotes
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento setup:static-content:deploy -f
bin/magento cache:flush
```

### Option 2: Manual Installation

1. Create directory `app/code/Priyank/ProductNotes`.
2. Extract the repository files into `app/code/Priyank/ProductNotes`.
3. Run:
```bash
bin/magento module:enable Priyank_ProductNotes
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento setup:static-content:deploy -f
bin/magento cache:flush
```

---

## 💻 REST Web API Usage

### 1. Get Notes by Product ID
* **Endpoint:** `GET /V1/productnotes/product/:productId`
* **Response:**
```json
{
  "product_id": 42,
  "notes": [
    {
      "note_id": 1,
      "note": "Supplier lead time increased to 3 weeks for Q4.",
      "created_at": "2026-02-14 09:30:00"
    }
  ]
}
```

### 2. Add Internal Note to Product
* **Endpoint:** `POST /V1/productnotes`
* **Payload:**
```json
{
  "productNote": {
    "product_id": 42,
    "note": "Hold shipment pending warehouse quality verification."
  }
}
```

---

## 🏗 Architecture & File Structure

```
├── Api/
│   ├── Data/
│   │   ├── ProductNotesInterface.php
│   │   └── ProductNotesSearchResultsInterface.php
│   └── ProductNotesRepositoryInterface.php
├── Block/
│   └── Adminhtml/ProductNotes/
├── Controller/
│   └── Adminhtml/ProductNotes/
├── Model/
│   ├── Source/
│   │   └── ProductList.php
│   ├── ResourceModel/
│   │   ├── ProductNotes.php
│   │   └── ProductNotes/Collection.php
│   ├── ProductNotes.php
│   └── ProductNotesRepository.php
├── Ui/
│   └── Component/Listing/Column/
├── etc/
│   ├── adminhtml/
│   │   ├── menu.xml
│   │   └── routes.xml
│   ├── db_schema.xml
│   ├── di.xml
│   ├── module.xml
│   └── webapi.xml
├── view/
│   └── adminhtml/
│       ├── layout/
│       └── ui_component/priyank_productnotes_productnotes_listing.xml
├── composer.json
└── registration.php
```

---

## 📄 License

Open-source module released under the [MIT License](LICENSE).

---

## 💼 Developing a Magento 2 project?

I help businesses build, customize, optimize, and maintain **Magento 2 / Adobe Commerce** stores.

**Available for:**
* Magento 2 Custom Development & Architecture
* Custom Magento Extensions & Modules
* Bug Fixes, Audits, and Troubleshooting
* Performance Optimization & Core Web Vitals
* Hyvä Theme Development & Customization
* Headless GraphQL & REST API Integrations
* Ongoing Magento Store Maintenance

👉 **Hire me on Upwork:** [Priyank Jivani on Upwork](https://www.upwork.com/freelancers/priyankjivani)  
👉 **GitHub Profile:** [priyankjivani123](https://github.com/priyankjivani123)

Contact me for freelance projects and long-term enterprise collaborations.
