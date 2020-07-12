INSERT INTO countries
VALUES
    (UUID(), 'DE', 'Germany', NULL, NULL, NULL),
    (UUID(), 'TR', 'Turkey', NULL, NULL, NULL),
    (UUID(), 'LT', 'Lithuania', NULL, NULL, NULL),
    (UUID(), 'USA', 'United States of America', NULL, NULL, NULL);

INSERT INTO states
VALUES
    (UUID(), (SELECT id FROM countries WHERE name='Germany'), 'Berlin', NULL, NULL, NULL),
    (UUID(), (SELECT id FROM countries WHERE name='Turkey'), 'Istanbul', NULL, NULL, NULL),
    (UUID(), (SELECT id FROM countries WHERE name='Lithuania'), 'Kaunas', NULL, NULL, NULL),
    (UUID(), (SELECT id FROM countries WHERE name='United States of America'), 'Michigan', NULL, NULL, NULL),
    (UUID(), (SELECT id FROM countries WHERE name='United States of America'), 'Pennsylvania', NULL, NULL, NULL);

INSERT INTO cities
VALUES
    (UUID(), (SELECT id FROM states WHERE name='Berlin'), 'Berlin', NULL, NULL, NULL),
    (UUID(), (SELECT id FROM states WHERE name='Istanbul'), 'Istanbul', NULL, NULL, NULL),
    (UUID(), (SELECT id FROM states WHERE name='Kaunas'), 'Kaunas', NULL, NULL, NULL),
    (UUID(), (SELECT id FROM states WHERE name='Michigan'), 'Detroit', NULL, NULL, NULL),
    (UUID(), (SELECT id FROM states WHERE name='Pennsylvania'), 'Pittsburgh', NULL, NULL, NULL);

INSERT INTO locations
VALUES
    (UUID(), (SELECT id FROM cities WHERE name='Berlin'), 'Mercedes-Benz Arena', NULL, NULL, NULL),
    (UUID(), (SELECT id FROM cities WHERE name='Istanbul'), 'Sinan Erdem Dome', NULL, NULL, NULL),
    (UUID(), (SELECT id FROM cities WHERE name='Kaunas'), 'Zalgirio Arena', NULL, NULL, NULL),
    (UUID(), (SELECT id FROM cities WHERE name='Detroit'), 'Little Caesars Arena', NULL, NULL, NULL);

INSERT INTO sports
VALUES
    (UUID(), 'Basketball', 'basketball.png', NULL, NULL, NULL),
    (UUID(), 'Ice hockey', 'ice-hockey.png', NULL, NULL, NULL);

INSERT INTO competitions
VALUES
    (UUID(), (SELECT id FROM sports WHERE name='Basketball'), 'Turkish Airlines EuroLeague', '2020', '2020-10-01', NULL, NULL, NULL, NULL),
    (UUID(), (SELECT id FROM sports WHERE name='Ice hockey'), 'National Hockey League', '2020', '2020-10-01', NULL, NULL, NULL, NULL);

INSERT INTO competitors
VALUES
    (UUID(), (SELECT id FROM cities WHERE name='Berlin'), (SELECT id FROM countries WHERE name='Germany'), 'ALBA Berlin', NULL, NULL, NULL),
    (UUID(), (SELECT id FROM cities WHERE name='Istanbul'), (SELECT id FROM countries WHERE name='Turkey'), 'Anadolu Efes', NULL, NULL, NULL),
    (UUID(), (SELECT id FROM cities WHERE name='Kaunas'), (SELECT id FROM countries WHERE name='Lithuania'), 'Zalgiris', NULL, NULL, NULL),
    (UUID(), (SELECT id FROM cities WHERE name='Detroit'), (SELECT id FROM countries WHERE name='United States of America'), 'Detroit Red Wings', NULL, NULL, NULL),
    (UUID(), (SELECT id FROM cities WHERE name='Detroit'), (SELECT id FROM countries WHERE name='United States of America'), 'Pittsburgh Penguins', NULL, NULL, NULL);

INSERT INTO events
VALUES
    (
        UUID(),
        (SELECT id FROM locations WHERE name='Zalgirio Arena'),
        (SELECT id FROM sports WHERE name='Basketball'),
        (SELECT id FROM competitions WHERE name='Turkish Airlines EuroLeague'),
        (SELECT id FROM competitors WHERE name='Zalgiris'),
        (SELECT id FROM competitors WHERE name='Anadolu Efes'),
        'canceled',
        '2020-10-10 20:00:00',
        'euroleague.png',
        NULL,
        NULL,
        NULL
    ),
    (
        UUID(),
        (SELECT id FROM locations WHERE name='Little Caesars Arena'),
        (SELECT id FROM sports WHERE name='Ice hockey'),
        (SELECT id FROM competitions WHERE name='National Hockey League'),
        (SELECT id FROM competitors WHERE name='Pittsburgh Penguins'),
        (SELECT id FROM competitors WHERE name='Detroit Red Wings'),
        'canceled',
        '2020-10-10 20:00:00',
        'nhl.png',
        NULL,
        NULL,
        NULL
    );