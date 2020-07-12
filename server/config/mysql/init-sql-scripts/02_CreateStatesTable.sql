CREATE TABLE IF NOT EXISTS states (
    id varchar(36) NOT NULL,
    _country_id  varchar(36) NOT NULL,
    name varchar(200) NOT NULL,

    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    deleted_at timestamp NULL DEFAULT NULL,

    PRIMARY KEY (id),
    FOREIGN KEY (_country_id) REFERENCES countries(id)
);