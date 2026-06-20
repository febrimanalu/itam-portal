CREATE DATABASE IF NOT EXISTS itam_portal CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE itam_portal;

CREATE TABLE locations (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    yard VARCHAR(80) NOT NULL,
    building VARCHAR(120) NOT NULL,
    level_name VARCHAR(80) NOT NULL,
    owner_code VARCHAR(40) NOT NULL DEFAULT 'PIC',
    display_name VARCHAR(255) GENERATED ALWAYS AS (CONCAT(yard, ' - ', building, ' ', level_name, ' (', owner_code, ')')) STORED,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE vendors (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(160) NOT NULL,
    contact_name VARCHAR(120),
    email VARCHAR(160),
    phone VARCHAR(60),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE assets (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    asset_tag VARCHAR(80) NOT NULL UNIQUE,
    serial_number VARCHAR(120),
    asset_type VARCHAR(80) NOT NULL,
    manufacturer VARCHAR(120),
    model VARCHAR(120),
    location_id INT UNSIGNED,
    vendor_id INT UNSIGNED,
    purchase_date DATE,
    warranty_end DATE,
    lifecycle_status ENUM('in_stock','deployed','repair','retired','disposed') DEFAULT 'deployed',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (location_id) REFERENCES locations(id),
    FOREIGN KEY (vendor_id) REFERENCES vendors(id)
);

CREATE TABLE endpoints (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    asset_id INT UNSIGNED,
    hostname VARCHAR(120) NOT NULL UNIQUE,
    assigned_user VARCHAR(160),
    operating_system VARCHAR(160),
    ip_address VARCHAR(45),
    mac_address VARCHAR(32),
    last_seen_at DATETIME,
    health_status ENUM('healthy','needs_patch','offline','encryption_missing') DEFAULT 'healthy',
    pdq_device_id VARCHAR(120),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (asset_id) REFERENCES assets(id)
);

CREATE TABLE software_inventory (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    endpoint_id INT UNSIGNED,
    product_name VARCHAR(180) NOT NULL,
    publisher VARCHAR(160),
    version VARCHAR(80),
    installed_at DATE,
    discovered_source ENUM('manual','agent','pdq_connect') DEFAULT 'manual',
    FOREIGN KEY (endpoint_id) REFERENCES endpoints(id)
);

CREATE TABLE software_licenses (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(180) NOT NULL,
    vendor_id INT UNSIGNED,
    license_key VARCHAR(255),
    seats_owned INT UNSIGNED NOT NULL DEFAULT 0,
    seats_assigned INT UNSIGNED NOT NULL DEFAULT 0,
    renewal_date DATE,
    compliance_status ENUM('compliant','available','over_allocated','expired') DEFAULT 'compliant',
    FOREIGN KEY (vendor_id) REFERENCES vendors(id)
);

CREATE TABLE contracts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    vendor_id INT UNSIGNED,
    contract_type ENUM('software','hardware','copier','network_line','support','other') NOT NULL,
    contract_number VARCHAR(120) NOT NULL UNIQUE,
    title VARCHAR(180) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    status ENUM('draft','active','expiring','expired','terminated') DEFAULT 'active',
    document_path VARCHAR(255),
    owner VARCHAR(120),
    FOREIGN KEY (vendor_id) REFERENCES vendors(id)
);

CREATE TABLE contract_costs (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    contract_id INT UNSIGNED NOT NULL,
    cost_type ENUM('monthly','annual','one_time') NOT NULL,
    amount DECIMAL(12,2) NOT NULL,
    currency CHAR(3) NOT NULL DEFAULT 'USD',
    cost_center VARCHAR(80),
    effective_date DATE NOT NULL,
    FOREIGN KEY (contract_id) REFERENCES contracts(id)
);

CREATE TABLE copier_machines (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    asset_id INT UNSIGNED,
    contract_id INT UNSIGNED,
    location_id INT UNSIGNED,
    meter_reading INT UNSIGNED DEFAULT 0,
    monthly_allowance INT UNSIGNED,
    support_contact VARCHAR(160),
    FOREIGN KEY (asset_id) REFERENCES assets(id),
    FOREIGN KEY (contract_id) REFERENCES contracts(id),
    FOREIGN KEY (location_id) REFERENCES locations(id)
);

CREATE TABLE network_lines (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    contract_id INT UNSIGNED,
    location_id INT UNSIGNED,
    circuit_id VARCHAR(120) NOT NULL,
    line_type VARCHAR(80) NOT NULL,
    bandwidth VARCHAR(80),
    provider VARCHAR(120),
    monthly_cost DECIMAL(12,2),
    status ENUM('active','pending','down','cancelled') DEFAULT 'active',
    FOREIGN KEY (contract_id) REFERENCES contracts(id),
    FOREIGN KEY (location_id) REFERENCES locations(id)
);

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(160) NOT NULL,
    email VARCHAR(180) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('administrator','asset_manager','technician','viewer') DEFAULT 'viewer',
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE audit_logs (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED,
    entity_type VARCHAR(80) NOT NULL,
    entity_id BIGINT UNSIGNED,
    action VARCHAR(80) NOT NULL,
    details JSON,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO locations (yard, building, level_name, owner_code) VALUES
('Yard 1', 'Main Office', 'Level 2', 'PIC'),
('Yard 2', 'New Building', 'Level 1', 'PIC');
