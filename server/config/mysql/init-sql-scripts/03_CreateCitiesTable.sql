CREATE TABLE IF NOT EXISTS cities (
    id varchar(36) NOT NULL,
    _state_id  varchar(36) NOT NULL,
    name varchar(200) NOT NULL,

    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    deleted_at timestamp NULL DEFAULT NULL,

    PRIMARY KEY (id),
    FOREIGN KEY (_state_id) REFERENCES states(id)
);