create table rapid_vax.user
(
    id       int auto_increment
        primary key,
    email    varchar(180)                 not null,
    roles    longtext collate utf8mb4_bin not null
        check (json_valid(`roles`)),
    password varchar(255)                 not null,
    username varchar(180)                 not null,
    type     varchar(255)                 not null,
    constraint UNIQ_8D93D649E7927C74
        unique (email)
) collate = utf8mb4_unicode_ci;

INSERT INTO rapid_vax.user (email, roles, password, username, type)
VALUES
('lansana@rapidvax.com', '["ROLE_ADMIN"]', '$2y$10$aJyfXxUy6ZLywZzNmJ76gunosaA/EXVqSykDnwOWoleoLDz1zFwGC', 'lansana', 'admin'),
('brandon@rapidvax.com', '["ROLE_ADMIN"]', '$2y$10$aJyfXxUy6ZLywZzNmJ76gunosaA/EXVqSykDnwOWoleoLDz1zFwGC', 'brandon', 'admin'),
('erica@rapidvax.com', '["ROLE_ADMIN"]', '$2y$10$aJyfXxUy6ZLywZzNmJ76gunosaA/EXVqSykDnwOWoleoLDz1zFwGC', 'erica', 'admin'),
('laura@rapidvax.com', '["ROLE_ADMIN"]', '$2y$10$aJyfXxUy6ZLywZzNmJ76gunosaA/EXVqSykDnwOWoleoLDz1zFwGC', 'laura', 'admin'),
('mariama@rapidvax.com', '["ROLE_ADMIN"]', '$2y$10$aJyfXxUy6ZLywZzNmJ76gunosaA/EXVqSykDnwOWoleoLDz1zFwGC', 'mariama', 'admin'),
('redouane@rapidvax.com', '["ROLE_ADMIN"]', '$2y$10$aJyfXxUy6ZLywZzNmJ76gunosaA/EXVqSykDnwOWoleoLDz1zFwGC', 'redouane', 'admin');

-- Insertion de nouveaux utilisateurs pour les clients
INSERT INTO rapid_vax.user (email, roles, password, username) VALUES
('contact@globaltech.com', '["ROLE_CLIENT"]', '$2y$10$tPQi4fbiLsORQqQJaPh.7OPsR0cWM4pEopo440oX.d90ZulFsq7pm', 'globaltech_user'),
('info@innovateinc.com', '["ROLE_CLIENT"]', '$2y$10$tPQi4fbiLsORQqQJaPh.7OPsR0cWM4pEopo440oX.d90ZulFsq7pm', 'innovateinc_user'),
('contact@alphasystems.com', '["ROLE_CLIENT"]', '$2y$10$tPQi4fbiLsORQqQJaPh.7OPsR0cWM4pEopo440oX.d90ZulFsq7pm', 'alphasystems_user'),
('info@betasolutions.com', '["ROLE_CLIENT"]', '$2y$10$tPQi4fbiLsORQqQJaPh.7OPsR0cWM4pEopo440oX.d90ZulFsq7pm', 'betasolutions_user'),
('contact@techfrontiers.com', '["ROLE_CLIENT"]', '$2y$10$tPQi4fbiLsORQqQJaPh.7OPsR0cWM4pEopo440oX.d90ZulFsq7pm', 'techfrontiers_user'),
('contact@pharmacore.pharmaexample.com', '["ROLE_CLIENT"]', '$2y$10$tPQi4fbiLsORQqQJaPh.7OPsR0cWM4pEopo440oX.d90ZulFsq7pm', 'pharmacore_user'),
('info@biohealsolutions.pharmaexample.com', '["ROLE_CLIENT"]', '$2y$10$tPQi4fbiLsORQqQJaPh.7OPsR0cWM4pEopo440oX.d90ZulFsq7pm', 'bioheal_user'),
('contact@meditechlabs.pharmaexample.com', '["ROLE_CLIENT"]', '$2y$10$tPQi4fbiLsORQqQJaPh.7OPsR0cWM4pEopo440oX.d90ZulFsq7pm', 'meditech_user'),
('info@healthgenics.pharmaexample.com', '["ROLE_CLIENT"]', '$2y$10$tPQi4fbiLsORQqQJaPh.7OPsR0cWM4pEopo440oX.d90ZulFsq7pm', 'healthgenics_user'),
('contact@curesynthetics.pharmaexample.com', '["ROLE_CLIENT"]', '$2y$10$tPQi4fbiLsORQqQJaPh.7OPsR0cWM4pEopo440oX.d90ZulFsq7pm', 'curesynth_user');
;


create table rapid_vax.customer
(
    id              int          not null
        primary key,
    name            varchar(255) not null,
    customer_number varchar(20)  not null,
    constraint FK_81398E09BF396750
        foreign key (id) references rapid_vax.user (id)
            on delete cascade
) collate = utf8mb4_unicode_ci;

INSERT INTO rapid_vax.customer (name, customer_number)
VALUES
('GlobalTech', CONCAT('CLI', LPAD(FLOOR(RAND() * 9999), 4, '0'), 'GT')),
('InnovateInc', CONCAT('CLI', LPAD(FLOOR(RAND() * 9999), 4, '0'), 'II')),
('AlphaSystems', CONCAT('CLI', LPAD(FLOOR(RAND() * 9999), 4, '0'), 'AS')),
('BetaSolutions', CONCAT('CLI', LPAD(FLOOR(RAND() * 9999), 4, '0'), 'BS')),
('TechFrontiers', CONCAT('CLI', LPAD(FLOOR(RAND() * 9999), 4, '0'), 'TF')),
('PharmaCore', CONCAT('CLI', LPAD(FLOOR(RAND() * 9999), 4, '0'), 'PC')),
('BioHealSolutions', CONCAT('CLI', LPAD(FLOOR(RAND() * 9999), 4, '0'), 'BH')),
('MediTechLabs', CONCAT('CLI', LPAD(FLOOR(RAND() * 9999), 4, '0'), 'MT')),
('HealthGenics', CONCAT('CLI', LPAD(FLOOR(RAND() * 9999), 4, '0'), 'HG')),
('CureSynthetics', CONCAT('CLI', LPAD(FLOOR(RAND() * 9999), 4, '0'), 'CS')),
;
