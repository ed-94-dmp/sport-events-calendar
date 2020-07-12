CREATE TABLE IF NOT EXISTS sports (
    id varchar(36) NOT NULL,
    name varchar(200) NOT NULL,
    thumbnail_image varchar(200),

    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp NULL DEFAULT NULL,
    deleted_at timestamp NULL DEFAULT NULL,

    PRIMARY KEY (id)
);