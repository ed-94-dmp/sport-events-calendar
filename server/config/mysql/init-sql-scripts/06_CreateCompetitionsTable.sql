CREATE TABLE IF NOT EXISTS competitions (
    id varchar(36) NOT NULL,
    _sport_id  varchar(36) NOT NULL,
    name varchar(200) NOT NULL,
    season varchar(10) NOT NULL,
    date_from date NOT NULL,
    date_to date,

    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    deleted_at timestamp NULL DEFAULT NULL,

    PRIMARY KEY (id),
    FOREIGN KEY (_sport_id) REFERENCES sports(id)
);