CREATE TABLE IF NOT EXISTS events (
    id varchar(36) NOT NULL,
    _location_id  varchar(36) NOT NULL,
    _sport_id  varchar(36) NOT NULL,
    _competition_id  varchar(36),
    _competitor1_id  varchar(36) NOT NULL,
    _competitor2_id  varchar(36) NOT NULL,
    status enum('postponed', 'scheduled', 'canceled', 'to be announced') NOT NULL,
    datetime datetime,
    thumbnail_image varchar(200),

    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    deleted_at timestamp NULL DEFAULT NULL,

    PRIMARY KEY (id),
    FOREIGN KEY (_location_id) REFERENCES locations(id),
    FOREIGN KEY (_sport_id) REFERENCES sports(id),
    FOREIGN KEY (_competition_id) REFERENCES competitions(id),
    FOREIGN KEY (_competitor1_id) REFERENCES competitors(id),
    FOREIGN KEY (_competitor2_id) REFERENCES competitors(id)
);