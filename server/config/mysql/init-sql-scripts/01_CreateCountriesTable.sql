CREATE TABLE IF NOT EXISTS countries (
    id varchar(36) NOT NULL,
    code  varchar(3) NOT NULL,
    name varchar(200) NOT NULL,

    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    deleted_at timestamp NULL DEFAULT NULL,

    PRIMARY KEY (id)
);