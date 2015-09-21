CREATE TABLE IF NOT EXISTS `usuarios` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`curp` VARCHAR(20) NOT NULL,
	dato_personal_id INT,
	dato_sindical_id INT,
	dato_laboral_id INT,
	user_id INT,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `curp_UNIQUE` (`curp` ASC)
);

CREATE TABLE IF NOT EXISTS `dato_personals` (
	`id` INT UNSIGNED NOT NULL  AUTO_INCREMENT,
	`rfc` VARCHAR(20) NOT NULL,
	`nombre` VARCHAR(50) NOT NULL,
	`a_paterno` VARCHAR(50) NOT NULL,
	`a_materno` VARCHAR(50) NOT NULL,
	`genero` VARCHAR(50),
	`telefono_1` VARCHAR(50),
	`telefono_2` VARCHAR(50),
	`fecha_nacimiento` DATE,
	`email` VARCHAR(150) NOT NULL,
	`codigo_postal` VARCHAR(10),
	`estado` VARCHAR(64),
	`municipio` VARCHAR(64),
	`calle` VARCHAR(100),
	`num_ext` VARCHAR(10),
	`num_int` VARCHAR(10),
	`localidad` VARCHAR(100),
	`ayudas` VARCHAR(150),
	`tipo_sanguineo` VARCHAR(10),
	`alergias` VARCHAR(250),
	`institucion_seguridad` VARCHAR(250),
	`número_afiliacion` VARCHAR(50),
	`fotografia` VARCHAR(255),
	PRIMARY KEY (`id`),
	UNIQUE INDEX `rfc_UNIQUE` (`rfc` ASC)
);

CREATE TABLE IF NOT EXISTS `dato_laborals` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`siglas` VARCHAR(30) NOT NULL,
	`empresa` VARCHAR(250) NOT NULL,
	`rfc` VARCHAR(15),
	`sector` VARCHAR(150) NOT NULL,
	`representante` VARCHAR(250),
	`email` VARCHAR(150),
	`sucursal` VARCHAR(150),
	`codigo_postal` VARCHAR(10),
	`estado_id` INT NOT NULL,
	`municipio_id` INT NOT NULL,
	`num_ext` VARCHAR(10) NOT NULL,
	`num_int` VARCHAR(10) NOT NULL,
	`calle` VARCHAR(100) NOT NULL,
	`localidad` VARCHAR(100) NOT NULL,
	`telefono_1` VARCHAR(50),
	`telefono_2` VARCHAR(50),
	`fotografia_logo` VARCHAR(255),
	PRIMARY KEY (`id`),
	UNIQUE INDEX `siglas_UNIQUE` (`siglas` ASC)
);

CREATE TABLE IF NOT EXISTS `dato_sindicals` (
	`id` INT UNSIGNED NOT NULL  AUTO_INCREMENT,
	`siglas` VARCHAR(30) NOT NULL,
	`sindicato` VARCHAR(250) NOT NULL,
	`rfc` VARCHAR(15),
	`sector` VARCHAR(150),
	`representante` VARCHAR(250),
	`email` VARCHAR(150),
	`sucursal` VARCHAR(150),
	`codigo_postal` VARCHAR(10),
	`estado` VARCHAR(64),
	`municipio` VARCHAR(64),
	`num_ext` VARCHAR(10),
	`num_int` VARCHAR(10),
	`calle` VARCHAR(100),
	`localidad` VARCHAR(64),
	`telefono_1` VARCHAR(50),
	`telefono_2` VARCHAR(50),
	`fotografia_logo` VARCHAR(255),
	PRIMARY KEY (`id`),
	UNIQUE INDEX `siglas_UNIQUE` (`siglas` ASC)
);

-- -----------------------------------------------------
-- Table `indet_inscripciones`.`mxestados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mxestados` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `indet_inscripciones`.`mxmunicipios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `indet_inscripciones`.`mxmunicipios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `mxestado_id` INT NOT NULL,
  `nombre` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_mxmunicipios_mxestados1_idx` (`mxestado_id` ASC),
  CONSTRAINT `fk_mxmunicipios_mxestados1`
    FOREIGN KEY (`mxestado_id`)
    REFERENCES `indet_inscripciones`.`mxestados` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `indet_inscripciones`.`mxcolonias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `indet_inscripciones`.`mxcolonias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `mxmunicipio_id` INT NOT NULL,
  `cp` VARCHAR(5) NOT NULL,
  `nombre` VARCHAR(64) NOT NULL,
  `ciudad` VARCHAR(64) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_mxcolonias_mxmunicipios1_idx` (`mxmunicipio_id` ASC),
  CONSTRAINT `fk_mxcolonias_mxmunicipios1`
    FOREIGN KEY (`mxmunicipio_id`)
    REFERENCES `indet_inscripciones`.`mxmunicipios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `indet_inscripciones`.`mxlocalidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `indet_inscripciones`.`mxlocalidad` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `mxcolonia_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_mxlocalidad_mxcolonias1_idx` (`mxcolonia_id` ASC),
  CONSTRAINT `fk_mxlocalidad_mxcolonias1`
    FOREIGN KEY (`mxcolonia_id`)
    REFERENCES `indet`.`mxcolonias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

