--------------------------------------------------------
-- Archivo creado  - jueves-abril-23-2020   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Sequence SEC_EMPLEADO
--------------------------------------------------------

   CREATE SEQUENCE  "SEC_EMPLEADO"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 21 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence SEC_FOTO
--------------------------------------------------------

   CREATE SEQUENCE  "SEC_FOTO"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 2 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence SEC_LINEAPEDIDO
--------------------------------------------------------

   CREATE SEQUENCE  "SEC_LINEAPEDIDO"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 2 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence SEC_PEDIDO
--------------------------------------------------------

   CREATE SEQUENCE  "SEC_PEDIDO"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 2 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence SEC_PROVEEDOR
--------------------------------------------------------

   CREATE SEQUENCE  "SEC_PROVEEDOR"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 41 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence SEC_RESERVA
--------------------------------------------------------

   CREATE SEQUENCE  "SEC_RESERVA"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence SEC_TICKET
--------------------------------------------------------

   CREATE SEQUENCE  "SEC_TICKET"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 2 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence SEC_USUARIO
--------------------------------------------------------

   CREATE SEQUENCE  "SEC_USUARIO"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 3 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence SEC_VENTA
--------------------------------------------------------

   CREATE SEQUENCE  "SEC_VENTA"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 2 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Table EMPLEADO
--------------------------------------------------------

  CREATE TABLE "EMPLEADO" ("OID_E" NUMBER, "NIF" CHAR(9), "NOMBRE" VARCHAR2(25), "APELLIDOS" VARCHAR2(50), "TURNO" CHAR(1), "SUELDO" FLOAT(126), "ID" NUMBER(9,0)) ;
--------------------------------------------------------
--  DDL for Table FOTO
--------------------------------------------------------

  CREATE TABLE "FOTO" ("OID_FOTO" NUMBER, "URL" VARCHAR2(40), "OID_PR" NUMBER) ;
--------------------------------------------------------
--  DDL for Table LINEAPEDIDO
--------------------------------------------------------

  CREATE TABLE "LINEAPEDIDO" ("OID_LP" NUMBER, "CANTIDAD" NUMBER, "PRECIO" FLOAT(126), "OID_PEDIDO" NUMBER, "OID_PR" NUMBER, "ID" NUMBER(9,0)) ;
--------------------------------------------------------
--  DDL for Table PEDIDO
--------------------------------------------------------

  CREATE TABLE "PEDIDO" ("OID_PEDIDO" NUMBER, "FECHA" DATE, "OID_U" NUMBER, "OID_ET" NUMBER, "ID" VARCHAR2(20)) ;
--------------------------------------------------------
--  DDL for Table PRODUCTO
--------------------------------------------------------

  CREATE TABLE "PRODUCTO" ("OID_PR" NUMBER, "NOMBRE" VARCHAR2(20), "PRECIO" FLOAT(126), "STOCK" NUMBER, "VALORACION" NUMBER, "DEVUELTO" NUMBER, "ESCOMIC" NUMBER, "EDITORIAL" VARCHAR2(15), "ISBN" NUMBER(13,0), "ESFIGURA" NUMBER, "NUMSERIE" NUMBER(15,0), "ESJMESA" NUMBER, "NPIEZAS" NUMBER, "ESMERCH" NUMBER, "TIPO" VARCHAR2(15), "ID_PRODUCTO" NUMBER) ;
--------------------------------------------------------
--  DDL for Table PROVEEDOR
--------------------------------------------------------

  CREATE TABLE "PROVEEDOR" ("OID_PV" NUMBER(*,0), "CIF" CHAR(9), "NOMBRE" VARCHAR2(20), "TELEFONO" NUMBER(9,0), "DIRECCION" VARCHAR2(75)) ;
--------------------------------------------------------
--  DDL for Table RESERVA
--------------------------------------------------------

  CREATE TABLE "RESERVA" ("OID_RES" NUMBER, "FECHA" DATE, "FECHAMAXRECOGIDA" DATE, "TOTAL" FLOAT(126), "TENTREGADO" FLOAT(126), "OID_U" NUMBER, "ID" NUMBER, "ESRECOGIDO" NUMBER) ;
--------------------------------------------------------
--  DDL for Table TICKET
--------------------------------------------------------

  CREATE TABLE "TICKET" ("OID_TICKET" NUMBER, "FECHA" DATE, "COMENTARIO" VARCHAR2(250), "OID_U" NUMBER, "OID_E" NUMBER, "RESUELTO" NUMBER, "NOMBRE" VARCHAR2(20), "EMAIL" VARCHAR2(50)) ;
--------------------------------------------------------
--  DDL for Table USUARIO
--------------------------------------------------------

  CREATE TABLE "USUARIO" ("OID_U" NUMBER, "NIF" CHAR(9), "NOMBRE" VARCHAR2(25), "APELLIDOS" VARCHAR2(50), "EMAIL" VARCHAR2(50), "TELEFONO" NUMBER(9,0), "ESSOCIO" NUMBER, "DIRECCION" VARCHAR2(75), "EDAD" NUMBER(3,0), "CONTRASEÑA" VARCHAR2(100)) ;
--------------------------------------------------------
--  DDL for Table VENTA
--------------------------------------------------------

  CREATE TABLE "VENTA" ("OID_VENTA" NUMBER, "FECHA" DATE, "ID" NUMBER, "OID_U" NUMBER) ;
REM INSERTING into EMPLEADO
SET DEFINE OFF;
REM INSERTING into FOTO
SET DEFINE OFF;
REM INSERTING into LINEAPEDIDO
SET DEFINE OFF;
REM INSERTING into PEDIDO
SET DEFINE OFF;
REM INSERTING into PRODUCTO
SET DEFINE OFF;
Insert into PRODUCTO (OID_PR,NOMBRE,PRECIO,STOCK,VALORACION,DEVUELTO,ESCOMIC,EDITORIAL,ISBN,ESFIGURA,NUMSERIE,ESJMESA,NPIEZAS,ESMERCH,TIPO,ID_PRODUCTO) values ('123456','Juan y Medio1','288','2','4','0','0','0','0','1','1234','0','0','0','0',null);
REM INSERTING into PROVEEDOR
SET DEFINE OFF;
Insert into PROVEEDOR (OID_PV,CIF,NOMBRE,TELEFONO,DIRECCION) values ('21','G98798798','JuegosSA','987987987','Monzón nº14');
Insert into PROVEEDOR (OID_PV,CIF,NOMBRE,TELEFONO,DIRECCION) values ('22','T34534534','AdiosSA','654848518','Cervantes nº96');
Insert into PROVEEDOR (OID_PV,CIF,NOMBRE,TELEFONO,DIRECCION) values ('23','U34534534','BenzoSA','658585252','Monzón nº14');
Insert into PROVEEDOR (OID_PV,CIF,NOMBRE,TELEFONO,DIRECCION) values ('24','N65465454','JuegoSA','985274527','Juega nº15');
Insert into PROVEEDOR (OID_PV,CIF,NOMBRE,TELEFONO,DIRECCION) values ('25','G98798798','ComicSA','954613134','Gold nº67');
Insert into PROVEEDOR (OID_PV,CIF,NOMBRE,TELEFONO,DIRECCION) values ('26','G98798798','MesaSA','987465313','Monzón nº14');
Insert into PROVEEDOR (OID_PV,CIF,NOMBRE,TELEFONO,DIRECCION) values ('27','E34534553','MerchanSA','951874848','Monzón nº14');
Insert into PROVEEDOR (OID_PV,CIF,NOMBRE,TELEFONO,DIRECCION) values ('28','Q23423423','ToySA','968585744','Hola nº34');
Insert into PROVEEDOR (OID_PV,CIF,NOMBRE,TELEFONO,DIRECCION) values ('29','P34647567','GameSA','987987987','Monzón nº14');
Insert into PROVEEDOR (OID_PV,CIF,NOMBRE,TELEFONO,DIRECCION) values ('30','I23423443','Rockstar','965326955','Monzón nº14');
Insert into PROVEEDOR (OID_PV,CIF,NOMBRE,TELEFONO,DIRECCION) values ('31','H23423546','UbisoftSA','987987987','Machado nº98');
Insert into PROVEEDOR (OID_PV,CIF,NOMBRE,TELEFONO,DIRECCION) values ('32','R23452534','ManoloJuegosSA','987987987','Bécquer nº69');
Insert into PROVEEDOR (OID_PV,CIF,NOMBRE,TELEFONO,DIRECCION) values ('33','P23453465','PepeJuegosSA','987987987','Suiza nº32');
Insert into PROVEEDOR (OID_PV,CIF,NOMBRE,TELEFONO,DIRECCION) values ('34','K32456457','VecinoSA','987987987','Roma nº19');
Insert into PROVEEDOR (OID_PV,CIF,NOMBRE,TELEFONO,DIRECCION) values ('35','G98798798','PlanetaSA','987987987','Monzón nº14');
REM INSERTING into RESERVA
SET DEFINE OFF;
REM INSERTING into TICKET
SET DEFINE OFF;
REM INSERTING into USUARIO
SET DEFINE OFF;
REM INSERTING into VENTA
SET DEFINE OFF;
--------------------------------------------------------
--  DDL for Index AK_PROVEEDOR_NOMBRE
--------------------------------------------------------

  CREATE UNIQUE INDEX "AK_PROVEEDOR_NOMBRE" ON "PROVEEDOR" ("NOMBRE") ;
--------------------------------------------------------
--  DDL for Index AK_USUARIO_NIF
--------------------------------------------------------

  CREATE UNIQUE INDEX "AK_USUARIO_NIF" ON "USUARIO" ("NIF") ;
--------------------------------------------------------
--  DDL for Index PK_USUARIO
--------------------------------------------------------

  CREATE UNIQUE INDEX "PK_USUARIO" ON "USUARIO" ("OID_U") ;
--------------------------------------------------------
--  DDL for Index PK_LINEAPEDIDO
--------------------------------------------------------

  CREATE UNIQUE INDEX "PK_LINEAPEDIDO" ON "LINEAPEDIDO" ("OID_LP") ;
--------------------------------------------------------
--  DDL for Index PROVEEDOR_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "PROVEEDOR_PK" ON "PROVEEDOR" ("OID_PV") ;
--------------------------------------------------------
--  DDL for Index PK_PEDIDO
--------------------------------------------------------

  CREATE UNIQUE INDEX "PK_PEDIDO" ON "PEDIDO" ("OID_PEDIDO") ;
--------------------------------------------------------
--  DDL for Index AK_PRODUCTO_NOMBRE
--------------------------------------------------------

  CREATE UNIQUE INDEX "AK_PRODUCTO_NOMBRE" ON "PRODUCTO" ("NOMBRE") ;
--------------------------------------------------------
--  DDL for Index PK_EMPLEADO
--------------------------------------------------------

  CREATE UNIQUE INDEX "PK_EMPLEADO" ON "EMPLEADO" ("OID_E") ;
--------------------------------------------------------
--  DDL for Index PK_RESERVA
--------------------------------------------------------

  CREATE UNIQUE INDEX "PK_RESERVA" ON "RESERVA" ("OID_RES") ;
--------------------------------------------------------
--  DDL for Index PK_FOTO
--------------------------------------------------------

  CREATE UNIQUE INDEX "PK_FOTO" ON "FOTO" ("OID_FOTO") ;
--------------------------------------------------------
--  DDL for Index PK_PRODUCTO
--------------------------------------------------------

  CREATE UNIQUE INDEX "PK_PRODUCTO" ON "PRODUCTO" ("OID_PR") ;
--------------------------------------------------------
--  DDL for Index AK_EMPLEADO_NIF
--------------------------------------------------------

  CREATE UNIQUE INDEX "AK_EMPLEADO_NIF" ON "EMPLEADO" ("NIF") ;
--------------------------------------------------------
--  DDL for Index PK_VENTA
--------------------------------------------------------

  CREATE UNIQUE INDEX "PK_VENTA" ON "VENTA" ("OID_VENTA") ;
--------------------------------------------------------
--  DDL for Index PK_TICKET
--------------------------------------------------------

  CREATE UNIQUE INDEX "PK_TICKET" ON "TICKET" ("OID_TICKET") ;
--------------------------------------------------------
--  DDL for Trigger NOMBRE_USUARIOS
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "NOMBRE_USUARIOS" 
BEFORE INSERT ON IISSI.USUARIO
FOR EACH ROW

DECLARE numeroUsuarios number(2);

BEGIN
    SELECT count(*) INTO numeroUsuarios FROM IISSI.USUARIO WHERE NOMBRE like :NEW.NOMBRE;
    IF(numeroUsuarios >= 1) THEN
    raise_application_error (-20600, 'No puede haber dos usuarios con el mismo nombre');
    END IF;
END;
/
ALTER TRIGGER "NOMBRE_USUARIOS" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TR_ENTREGA_RESERVAS
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "TR_ENTREGA_RESERVAS" 
BEFORE INSERT OR UPDATE ON Reserva
FOR EACH ROW
DECLARE
  entrega NUMBER(3,2);
  porcentaje_minimo NUMBER(3,2);
BEGIN 
  SELECT TEntregado INTO entrega FROM Reserva WHERE OID_RES = :NEW.OID_RES;
  SELECT TOTAL*0.10 INTO porcentaje_minimo FROM Reserva WHERE OID_RES = :NEW.OID_RES;
  IF (entrega < porcentaje_minimo)
  THEN raise_application_error
    (-40,'Debe entregarse al menos el 10% del precio total de la reserva');
  END IF;
END;
/
ALTER TRIGGER "TR_ENTREGA_RESERVAS" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TR_FECHAMAXIMA
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "TR_FECHAMAXIMA" 
BEFORE INSERT OR UPDATE ON Reserva
FOR EACH ROW
DECLARE
  fecha DATE;
BEGIN 
  SELECT fechamaxrecogida INTO fecha FROM Reserva WHERE OID_Res = :NEW.OID_Res;
  IF (fecha < SYSDATE)
  THEN 
    PK_Reserva.Eliminar_reserva('Eliminar reserva', :NEW.OID_Res, true);
    raise_application_error (-60,'Se cancela la reserva porque no se ha recogido a tiempo');
  END IF;
END;
/
ALTER TRIGGER "TR_FECHAMAXIMA" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TR_RESERVAS
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "TR_RESERVAS" 
BEFORE INSERT OR UPDATE ON Reserva
FOR EACH ROW 
DECLARE
  n_Stock INTEGER;
BEGIN
  SELECT Stock INTO n_Stock FROM Producto WHERE OID_PR = Reserva.OID_PR;
  IF (n_Stock <= 1 OR NULL)
    THEN raise_application_error
      (-30,'El producto no se encuentra en Stock');
  END IF;
END;
/
ALTER TRIGGER "TR_RESERVAS" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TR_SEC_EMPLEADO
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "TR_SEC_EMPLEADO" 
BEFORE INSERT ON Empleado
FOR EACH ROW
DECLARE
    valor NUMBER:= 0;
    BEGIN 
     SELECT SEC_Empleado.NEXTVAL INTO valor FROM DUAL;
     :NEW.OID_E := valor;
END;
/
ALTER TRIGGER "TR_SEC_EMPLEADO" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TR_SEC_FOTO
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "TR_SEC_FOTO" 
BEFORE INSERT ON Foto
FOR EACH ROW
DECLARE
    valor NUMBER:= 0;
    BEGIN 
     SELECT SEC_Foto.NEXTVAL INTO valor FROM DUAL;
     :NEW.OID_Foto := valor;
END;

/
ALTER TRIGGER "TR_SEC_FOTO" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TR_SEC_LINEAPEDIDO
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "TR_SEC_LINEAPEDIDO" 
BEFORE INSERT ON LineaPedido
FOR EACH ROW
DECLARE
    valor NUMBER:= 0;
    BEGIN 
     SELECT SEC_LineaPedido.NEXTVAL INTO valor FROM DUAL;
     :NEW.OID_LP := valor;
END;

/
ALTER TRIGGER "TR_SEC_LINEAPEDIDO" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TR_SEC_PEDIDO
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "TR_SEC_PEDIDO" 
BEFORE INSERT ON Pedido
FOR EACH ROW
DECLARE
    valor NUMBER:= 0;
    BEGIN 
     SELECT SEC_Pedido.NEXTVAL INTO valor FROM DUAL;
     :NEW.OID_Pedido := valor;
END;

/
ALTER TRIGGER "TR_SEC_PEDIDO" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TR_SEC_PROVEEDOR
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "TR_SEC_PROVEEDOR" 
BEFORE INSERT ON PROVEEDOR
FOR EACH ROW
DECLARE
    valor NUMBER:= 0;
    BEGIN 
     SELECT SEC_PROVEEDOR.NEXTVAL INTO valor FROM DUAL;
     :NEW.OID_PV := valor;
END;
/
ALTER TRIGGER "TR_SEC_PROVEEDOR" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TR_SEC_RESERVA
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "TR_SEC_RESERVA" 
BEFORE INSERT ON Reserva
FOR EACH ROW
DECLARE
    valor NUMBER:= 0;
    BEGIN 
     SELECT SEC_Reserva.NEXTVAL INTO valor FROM DUAL;
     :NEW.OID_Res := valor;
END;

/
ALTER TRIGGER "TR_SEC_RESERVA" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TR_SEC_TICKET
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "TR_SEC_TICKET" 
BEFORE INSERT ON Ticket
FOR EACH ROW
DECLARE
    valor NUMBER:= 0;
    BEGIN 
     SELECT SEC_Ticket.NEXTVAL INTO valor FROM DUAL;
     :NEW.OID_Ticket := valor;
END;

/
ALTER TRIGGER "TR_SEC_TICKET" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TR_SEC_USUARIO
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "TR_SEC_USUARIO" 
BEFORE INSERT ON Usuario
FOR EACH ROW
DECLARE
    valor NUMBER:= 0;
    BEGIN 
     SELECT SEC_Usuario.NEXTVAL INTO valor FROM DUAL;
     :NEW.OID_U := valor;
END;

/
ALTER TRIGGER "TR_SEC_USUARIO" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TR_SEC_VENTA
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "TR_SEC_VENTA" 
BEFORE INSERT ON Venta
FOR EACH ROW
DECLARE
    valor NUMBER:= 0;
    BEGIN 
     SELECT SEC_Venta.NEXTVAL INTO valor FROM DUAL;
     :NEW.OID_Venta := valor;
END;

/
ALTER TRIGGER "TR_SEC_VENTA" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TR_TICKETS
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "TR_TICKETS" 
BEFORE INSERT OR UPDATE ON Ticket
FOR EACH ROW
DECLARE 
  n_Tickets INTEGER;
BEGIN 
  SELECT COUNT(*) INTO n_Tickets FROM Ticket WHERE OID_U = :NEW.OID_U;
  IF (n_Tickets > 1)
  THEN raise_application_error
    (-50,'No se puede enviar un ticket si aún no se ha cerrado el anterior');
  END IF;
END;
/
ALTER TRIGGER "TR_TICKETS" ENABLE;
--------------------------------------------------------
--  DDL for Procedure ACTUALIZAR_EMPLEADO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "ACTUALIZAR_EMPLEADO" 

(W_OID_E IN EMPLEADO.OID_E%TYPE,
W_NIF IN EMPLEADO.NIF%TYPE,
W_NOMBRE IN EMPLEADO.NOMBRE%TYPE,
W_APELLIDOS IN EMPLEADO.APELLIDOS%TYPE,
W_TURNO IN EMPLEADO.TURNO%TYPE,
W_SUELDO IN EMPLEADO.SUELDO%TYPE) AS

BEGIN
    UPDATE EMPLEADO SET NIF = W_NIF WHERE OID_E = W_OID_E;
    UPDATE EMPLEADO SET NOMBRE = W_NOMBRE WHERE OID_E = W_OID_E;
    UPDATE EMPLEADO SET APELLIDOS = W_APELLIDOS WHERE OID_E = W_OID_E;
    UPDATE EMPLEADO SET TURNO = W_TURNO WHERE OID_E = W_OID_E;
    UPDATE EMPLEADO SET SUELDO = W_SUELDO WHERE OID_E = W_OID_E;
END ACTUALIZAR_EMPLEADO;

/
--------------------------------------------------------
--  DDL for Procedure ACTUALIZAR_EMPRESA_TRANSPORTE
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "ACTUALIZAR_EMPRESA_TRANSPORTE" 
(W_OID_ET IN EMPRESATRANSPORTE.OID_ET%TYPE,
W_NOMBRE IN EMPRESATRANSPORTE.NOMBRE%TYPE,
W_TELEFONO IN EMPRESATRANSPORTE.TELEFONO%TYPE,
W_DIRECCION IN EMPRESATRANSPORTE.DIRECCION%TYPE,
W_CIF IN EMPRESAtRANSPORTE.CIF%TYPE) AS
BEGIN
    UPDATE EMPRESATRANSPORTE SET NOMBRE = W_NOMBRE WHERE OID_ET = W_OID_ET;
    UPDATE EMPRESATRANSPORTE SET TELEFONO = W_TELEFONO WHERE OID_ET = W_OID_ET;
    UPDATE EMPRESATRANSPORTE SET CIF = W_CIF WHERE OID_ET = W_OID_ET;
    UPDATE EMPRESATRANSPORTE SET CIF = W_CIF WHERE OID_ET = W_OID_ET;
END ACTUALIZAR_EMPRESA_TRANSPORTE;

/
--------------------------------------------------------
--  DDL for Procedure ACTUALIZAR_FOTO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "ACTUALIZAR_FOTO" 
(W_OID_FOTO IN FOTO.OID_FOTO%TYPE,
W_URL IN FOTO.URL%TYPE,
W_OID_PR IN FOTO.OID_PR%TYPE) AS
BEGIN
  UPDATE FOTO SET URL = W_URL WHERE OID_FOTO = W_OID_FOTO;
END ACTUALIZAR_FOTO;

/
--------------------------------------------------------
--  DDL for Procedure ACTUALIZAR_LINEAPEDIDO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "ACTUALIZAR_LINEAPEDIDO" 
(W_OID_LP IN LINEAPEDIDO.OID_LP%TYPE,
W_OID_PEDIDO IN LINEAPEDIDO.OID_PEDIDO%TYPE,
W_CANTIDAD IN LINEAPEDIDO.CANTIDAD%TYPE,
W_PRECIO IN LINEAPEDIDO.PRECIO%TYPE,
W_OID_PR IN LINEAPEDIDO.OID_PR%TYPE) AS
BEGIN
  UPDATE LINEAPEDIDO SET CANTIDAD = W_CANTIDAD WHERE OID_LP = W_OID_LP;
  UPDATE LINEAPEDIDO SET PRECIO = W_PRECIO WHERE OID_LP = W_OID_LP;
  
END ACTUALIZAR_LINEAPEDIDO;

/
--------------------------------------------------------
--  DDL for Procedure ACTUALIZAR_PEDIDO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "ACTUALIZAR_PEDIDO" 
(W_OID_PEDIDO IN PEDIDO.OID_PEDIDO%TYPE,
W_OID_U IN PEDIDO.OID_U%TYPE,
W_OID_ET IN PEDIDO.OID_ET%TYPE,
W_ID IN PEDIDO.ID%TYPE,
W_FECHA IN PEDIDO.FECHA%TYPE) AS
BEGIN
  UPDATE PEDIDO SET ID = W_ID WHERE OID_PEDIDO = W_OID_PEDIDO;
  UPDATE PEDIDO SET FECHA = W_FECHA WHERE OID_PEDIDO = W_OID_PEDIDO;
 
END ACTUALIZAR_PEDIDO;

/
--------------------------------------------------------
--  DDL for Procedure ACTUALIZAR_PRODUCTO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "ACTUALIZAR_PRODUCTO" 
(W_OID_PR IN PRODUCTO.OID_PR%TYPE,
W_NOMBRE IN PRODUCTO.NOMBRE%TYPE,
W_PRECIO IN PRODUCTO.PRECIO%TYPE,
W_STOCK IN PRODUCTO.STOCK%TYPE,
W_VALORACION IN PRODUCTO.VALORACION%TYPE,
W_DEVUELTO IN PRODUCTO.DEVUELTO%TYPE,
W_ESCOMIC IN PRODUCTO.ESCOMIC%TYPE,
W_EDITORIAL IN PRODUCTO.EDITORIAL%TYPE,
W_ISBN IN PRODUCTO.ISBN%TYPE,
W_ESFIGURA IN PRODUCTO.ESFIGURA%TYPE,
W_NUMSERIE IN PRODUCTO.NUMSERIE%TYPE,
W_ESJMESA IN PRODUCTO.ESJMESA%TYPE,
W_NPIEZAS IN PRODUCTO.NPIEZAS%TYPE,
W_ESMERCH IN PRODUCTO.ESMERCH%TYPE,
W_TIPO IN PRODUCTO.TIPO%TYPE,
W_ID_PRODUCTO IN PRODUCTO.ID_PRODUCTO%TYPE) AS
BEGIN
    UPDATE PRODUCTO SET NOMBRE = W_NOMBRE WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET PRECIO = W_PRECIO WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET STOCK = W_STOCK WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET VALORACION = W_VALORACION WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET DEVUELTO = W_DEVUELTO WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET ESCOMIC = W_ESCOMIC WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET EDITORIAL= W_EDITORIAL WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET ISBN = W_ESFIGURA WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET ESFIGURA = W_ESFIGURA WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET NUMSERIE = W_NUMSERIE WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET ESJMESA = W_ESJMESA WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET NPIEZAS = W_NPIEZAS WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET ESMERCH = W_ESMERCH WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET TIPO = W_TIPO WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET ID_PRODUCTO = W_ID_PRODUCTO WHERE OID_PR = W_OID_PR;
    
    
END ACTUALIZAR_PRODUCTO;

/
--------------------------------------------------------
--  DDL for Procedure ACTUALIZAR_PROVEEDOR
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "ACTUALIZAR_PROVEEDOR" 
(W_CIF IN PROVEEDOR.CIF%TYPE,
W_NOMBRE IN PROVEEDOR.NOMBRE%TYPE,
W_TELEFONO IN PROVEEDOR.TELEFONO%TYPE,
W_DIRECCION IN PROVEEDOR.DIRECCION%TYPE,
W_OID_PV IN PROVEEDOR.OID_PV%TYPE) AS
BEGIN
  UPDATE PROVEEDOR SET CIF = W_CIF WHERE OID_PV = W_OID_PV;
  UPDATE PROVEEDOR SET NOMBRE = W_NOMBRE WHERE OID_PV = W_OID_PV;
  UPDATE PROVEEDOR SET TELEFONO = W_TELEFONO WHERE OID_PV = W_OID_PV;
  UPDATE PROVEEDOR SET DIRECCION = W_DIRECCION WHERE OID_PV = W_OID_PV;
   
END ACTUALIZAR_PROVEEDOR;

/
--------------------------------------------------------
--  DDL for Procedure ACTUALIZAR_RESERVA
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "ACTUALIZAR_RESERVA" 
(W_OID_RES IN RESERVA.OID_RES%TYPE,
W_OID_U IN RESERVA.OID_U%TYPE,
W_FECHA IN RESERVA.FECHA%TYPE,
W_FECHAMAXRECOGIDA IN RESERVA.FECHAMAXRECOGIDA%TYPE,
W_TOTAL IN RESERVA.TOTAL%TYPE,
W_TENTREGADO IN RESERVA.TENTREGADO%TYPE,
W_ID IN RESERVA.ID%TYPE,
W_ESRECOGIDO IN RESERVA.ESRECOGIDO%TYPE) AS
BEGIN
  UPDATE RESERVA SET FECHA = W_FECHA WHERE OID_RES = W_OID_RES;
  UPDATE RESERVA SET FECHAMAXRECOGIDA = W_FECHAMAXRECOGIDA WHERE OID_RES = W_OID_RES;
  UPDATE RESERVA SET TOTAL = W_TOTAL WHERE OID_RES = W_OID_RES;
  UPDATE RESERVA SET TENTREGADO = W_TENTREGADO WHERE OID_RES = W_OID_RES;
  UPDATE RESERVA SET ID = W_ID WHERE OID_RES = W_OID_RES;
  UPDATE RESERVA SET ESRECOGIDO = W_ESRECOGIDO WHERE OID_RES = W_OID_RES;
END ACTUALIZAR_RESERVA;

/
--------------------------------------------------------
--  DDL for Procedure ACTUALIZAR_TICKET
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "ACTUALIZAR_TICKET" 
(W_OID_TICKET IN TICKET.OID_TICKET%TYPE,
W_OID_U IN TICKET.OID_U%TYPE,
W_OID_E IN TICKET.OID_E%TYPE,
W_FECHA IN TICKET.FECHA%TYPE,
W_COMENTARIO IN TICKET.COMENTARIO%TYPE,
W_RESUELTO IN TICKET.RESUELTO%TYPE) AS

BEGIN
  UPDATE TICKET SET FECHA = W_FECHA WHERE OID_TICKET = W_OID_TICKET;
  UPDATE TICKET SET COMENTARIO = W_COMENTARIO WHERE OID_TICKET = W_OID_TICKET;
  UPDATE TICKET SET RESUELTO = W_RESUELTO WHERE OID_TICKET = W_OID_TICKET;
END ACTUALIZAR_TICKET;

/
--------------------------------------------------------
--  DDL for Procedure ACTUALIZAR_USUARIO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "ACTUALIZAR_USUARIO" 
(W_OID_U IN USUARIO.OID_U%TYPE,
W_NIF IN USUARIO.NIF%TYPE,
W_NOMBRE IN USUARIO.NOMBRE%TYPE,
W_APELLIDOS IN USUARIO.APELLIDOS%TYPE,
W_EMAIL IN USUARIO.EMAIL%TYPE,
W_TELEFONO IN USUARIO.TELEFONO%TYPE,
W_ESSOCIO IN USUARIO.ESSOCIO%TYPE,
W_DIRECCION IN USUARIO.DIRECCION%TYPE,
W_FECHANACIMIENTO IN USUARIO.FECHANACIMIENTO%TYPE) AS
BEGIN
  UPDATE USUARIO SET NIF = W_NIF WHERE OID_U = W_OID_U;
  UPDATE USUARIO SET NOMBRE = W_NOMBRE WHERE OID_U = W_OID_U;
  UPDATE USUARIO SET APELLIDOS= W_APELLIDOS WHERE OID_U = W_OID_U;
  UPDATE USUARIO SET EMAIL = W_EMAIL WHERE OID_U = W_OID_U;
  UPDATE USUARIO SET TELEFONO = W_TELEFONO WHERE OID_U = W_OID_U;
  UPDATE USUARIO SET ESSOCIO = W_ESSOCIO WHERE OID_U = W_OID_U;
  UPDATE USUARIO SET DIRECCION= W_DIRECCION WHERE OID_U = W_OID_U;
  UPDATE USUARIO SET FECHANACIMIENTO = W_FECHANACIMIENTO WHERE OID_U = W_OID_U;
END ACTUALIZAR_USUARIO;

/
--------------------------------------------------------
--  DDL for Procedure ACTUALIZAR_VENTA
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "ACTUALIZAR_VENTA" 
(W_OID_VENTA IN VENTA.OID_U%TYPE,
W_OID_U IN VENTA.OID_U%TYPE,
W_FECHA IN VENTA.FECHA%TYPE,
W_ID IN VENTA.ID%TYPE) AS
BEGIN
  UPDATE VENTA SET FECHA = W_FECHA WHERE OID_VENTA = W_OID_VENTA;
  UPDATE VENTA SET ID = W_ID WHERE OID_VENTA = W_OID_VENTA;
END ACTUALIZAR_VENTA;

/
--------------------------------------------------------
--  DDL for Procedure ELIMINAR_EMPLEADO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "ELIMINAR_EMPLEADO" 
(W_OID_E IN EMPLEADO.OID_E%TYPE) AS 
BEGIN
  DELETE FROM EMPLEADO WHERE OID_E = W_OID_E;
END ELIMINAR_EMPLEADO;

/
--------------------------------------------------------
--  DDL for Procedure ELIMINAR_EMPRESATRANSPORTE
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "ELIMINAR_EMPRESATRANSPORTE" 
(W_OID_ET IN EMPRESATRANSPORTE.OID_ET%TYPE)
AS 
BEGIN
  DELETE FROM EMPRESATRANSPORTE WHERE OID_ET = W_OID_ET;
END ELIMINAR_EMPRESATRANSPORTE;

/
--------------------------------------------------------
--  DDL for Procedure ELIMINAR_FOTO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "ELIMINAR_FOTO" 
(W_OID_FOTO IN FOTO.OID_FOTO%TYPE) AS 
BEGIN
  DELETE FROM FOTO WHERE OID_FOTO = W_OID_FOTO;
END ELIMINAR_FOTO;

/
--------------------------------------------------------
--  DDL for Procedure ELIMINAR_LINEAPEDIDO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "ELIMINAR_LINEAPEDIDO" 
(W_OID_LP IN LINEAPEDIDO.OID_LP%TYPE) AS
BEGIN
  DELETE FROM LINEAPEDIDO WHERE OID_LP = W_OID_LP;
END ELIMINAR_LINEAPEDIDO;

/
--------------------------------------------------------
--  DDL for Procedure ELIMINAR_PEDIDO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "ELIMINAR_PEDIDO" 
(W_OID_PEDIDO IN PEDIDO.OID_PEDIDO%TYPE) AS
BEGIN
  DELETE FROM PEDIDO WHERE OID_PEDIDO = W_OID_PEDIDO;
END ELIMINAR_PEDIDO;

/
--------------------------------------------------------
--  DDL for Procedure ELIMINAR_PRODUCTO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "ELIMINAR_PRODUCTO" 
(W_OID_PR IN PRODUCTO.OID_PR%TYPE)
AS 
BEGIN
  DELETE FROM PRODUCTO WHERE OID_PR = W_OID_PR;
END ELIMINAR_PRODUCTO;

/
--------------------------------------------------------
--  DDL for Procedure ELIMINAR_PROVEEDOR
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "ELIMINAR_PROVEEDOR" 
(W_OID_PV IN PROVEEDOR.OID_PV%TYPE)
AS 
BEGIN
  DELETE FROM PROVEEDOR WHERE OID_PV = W_OID_PV;
END ELIMINAR_PROVEEDOR;

/
--------------------------------------------------------
--  DDL for Procedure ELIMINAR_RESERVA
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "ELIMINAR_RESERVA" 
(W_OID_RES IN RESERVA.OID_RES%TYPE) AS 
BEGIN
  DELETE FROM RESERVA WHERE OID_RES = W_OID_RES;
END ELIMINAR_RESERVA;

/
--------------------------------------------------------
--  DDL for Procedure ELIMINAR_TICKET
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "ELIMINAR_TICKET" 
(W_OID_TICKET IN TICKET.OID_TICKET%TYPE) AS 
BEGIN
  DELETE FROM TICKET WHERE OID_TICKET = W_OID_TICKET;
END ELIMINAR_TICKET;

/
--------------------------------------------------------
--  DDL for Procedure ELIMINAR_USUARIO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "ELIMINAR_USUARIO" 
(W_OID_U IN USUARIO.OID_U%TYPE) AS 
BEGIN
  DELETE FROM USUARIO WHERE OID_U = W_OID_U;
END ELIMINAR_USUARIO;

/
--------------------------------------------------------
--  DDL for Procedure ELIMINAR_VENTA
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "ELIMINAR_VENTA" 
(W_OID_VENTA IN VENTA.OID_VENTA%TYPE) AS 
BEGIN
  DELETE FROM VENTA WHERE OID_VENTA = W_OID_VENTA;
END ELIMINAR_VENTA;

/
--------------------------------------------------------
--  DDL for Procedure INICIALIZAR_EMPLEADO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "INICIALIZAR_EMPLEADO" 
 AS 
BEGIN
  DELETE FROM EMPLEADO;
END INICIALIZAR_EMPLEADO;

/
--------------------------------------------------------
--  DDL for Procedure INICIALIZAR_EMPRESATRANSPORTE
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "INICIALIZAR_EMPRESATRANSPORTE" AS 
BEGIN
  DELETE FROM empresatransporte;
END INICIALIZAR_EMPRESATRANSPORTE;

/
--------------------------------------------------------
--  DDL for Procedure INICIALIZAR_FOTO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "INICIALIZAR_FOTO" AS 
BEGIN
  DELETE FROM FOTO;
END INICIALIZAR_FOTO;

/
--------------------------------------------------------
--  DDL for Procedure INICIALIZAR_LINEAPEDIDO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "INICIALIZAR_LINEAPEDIDO" AS 
BEGIN
  DELETE FROM LINEAPEDIDO;
END INICIALIZAR_LINEAPEDIDO;

/
--------------------------------------------------------
--  DDL for Procedure INICIALIZAR_PEDIDO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "INICIALIZAR_PEDIDO" 
 AS 
BEGIN
  DELETE FROM PEDIDO;
END INICIALIZAR_PEDIDO;

/
--------------------------------------------------------
--  DDL for Procedure INICIALIZAR_PRODUCTO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "INICIALIZAR_PRODUCTO" 
 AS 
BEGIN
  DELETE FROM PRODUCTO;
END INICIALIZAR_PRODUCTO;

/
--------------------------------------------------------
--  DDL for Procedure INICIALIZAR_PROVEEDOR
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "INICIALIZAR_PROVEEDOR" 
 AS 
BEGIN
  DELETE FROM PROVEEDOR;
END INICIALIZAR_PROVEEDOR;

/
--------------------------------------------------------
--  DDL for Procedure INICIALIZAR_RESERVA
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "INICIALIZAR_RESERVA" 
 AS 
BEGIN
  DELETE FROM RESERVA;
END INICIALIZAR_RESERVA;

/
--------------------------------------------------------
--  DDL for Procedure INICIALIZAR_TICKET
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "INICIALIZAR_TICKET" 
 AS 
BEGIN
  DELETE FROM TICKET;
END INICIALIZAR_TICKET;

/
--------------------------------------------------------
--  DDL for Procedure INICIALIZAR_USUARIO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "INICIALIZAR_USUARIO" AS 
BEGIN
  DELETE FROM USUARIO;
END INICIALIZAR_USUARIO;

/
--------------------------------------------------------
--  DDL for Procedure INICIALIZAR_VENTA
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "INICIALIZAR_VENTA" AS 
BEGIN
  DELETE FROM VENTA;
END INICIALIZAR_VENTA;

/
--------------------------------------------------------
--  DDL for Procedure NUEVA_EMPRESATRANSPORTE
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "NUEVA_EMPRESATRANSPORTE" 
(W_CIF IN EMPRESATRANSPORTE.CIF%TYPE,
W_NOMBRE IN EMPRESATRANSPORTE.NOMBRE%TYPE,
W_TELEFONO IN EMPRESATRANSPORTE.TELEFONO%TYPE,
W_DIRECCION IN EMPRESATRANSPORTE.DIRECCION%TYPE) IS
BEGIN
  INSERT INTO EMPRESATRANSPORTE(CIF, NOMBRE, TELEFONO, DIRECCION)
  VALUES (W_CIF, W_NOMBRE, W_TELEFONO, W_DIRECCION);
END NUEVA_EMPRESATRANSPORTE;

/
--------------------------------------------------------
--  DDL for Procedure NUEVA_FOTO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "NUEVA_FOTO" 
(W_URL IN FOTO.URL%TYPE) IS
BEGIN
  INSERT INTO FOTO(URL)
  VALUES(W_URL);
END NUEVA_FOTO;

/
--------------------------------------------------------
--  DDL for Procedure NUEVA_LINEAPEDIDO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "NUEVA_LINEAPEDIDO" 
(W_CANTIDAD IN LINEAPEDIDO.CANTIDAD%TYPE,
W_PRECIO IN LINEAPEDIDO.PRECIO%TYPE) IS
BEGIN
  INSERT INTO LINEAPEDIDO(CANTIDAD, PRECIO)
  VALUES (W_CANTIDAD, W_PRECIO);
END NUEVA_LINEAPEDIDO;

/
--------------------------------------------------------
--  DDL for Procedure NUEVA_RESERVA
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "NUEVA_RESERVA" 
(W_FECHA IN RESERVA.FECHA%TYPE,
W_FECHAMAXRECOGIDA IN RESERVA.FECHAMAXRECOGIDA%TYPE,
W_TOTAL IN RESERVA.TOTAL%TYPE,
W_TENTREGADO IN RESERVA.TENTREGADO%TYPE,
W_ID IN RESERVA.ID%TYPE,
W_ESRECOGIDO IN RESERVA.ESRECOGIDO%TYPE) IS
BEGIN
  INSERT INTO RESERVA (FECHA, FECHAMAXRECOGIDA, TOTAL, TENTREGADO, ID, ESRECOGIDO)
  VALUES (W_FECHA, W_FECHAMAXRECOGIDA, W_TOTAL, W_TENTREGADO, W_ID, W_ESRECOGIDO);
END NUEVA_RESERVA;

/
--------------------------------------------------------
--  DDL for Procedure NUEVA_VENTA
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "NUEVA_VENTA" 
(W_FECHA IN VENTA.FECHA%TYPE,
W_ID IN VENTA.ID%TYPE) IS
BEGIN
  INSERT INTO VENTA (FECHA, ID)
  VALUES (W_FECHA, W_ID);
END NUEVA_VENTA;

/
--------------------------------------------------------
--  DDL for Procedure NUEVO_EMPLEADO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "NUEVO_EMPLEADO" 
(W_NIF IN EMPLEADO.NIF%TYPE,
W_NOMBRE IN EMPLEADO.NOMBRE%TYPE,
W_APELLIDOS IN EMPLEADO.APELLIDOS%TYPE,
W_TURNO IN EMPLEADO.TURNO%TYPE,
W_SUELDO IN EMPLEADO.SUELDO%TYPE) IS
BEGIN
    INSERT INTO EMPLEADO(NIF, NOMBRE, APELLIDOS, TURNO, SUELDO)
    VALUES (W_NIF, W_NOMBRE, W_APELLIDOS, W_TURNO, W_SUELDO);
END NUEVO_EMPLEADO;

/
--------------------------------------------------------
--  DDL for Procedure NUEVO_PEDIDO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "NUEVO_PEDIDO" 
(W_ID IN PEDIDO.ID%TYPE,
W_FECHA IN PEDIDO.FECHA%TYPE) IS
BEGIN
  INSERT INTO PEDIDO (ID, FECHA)
  VALUES (W_ID, W_FECHA);
END NUEVO_PEDIDO;

/
--------------------------------------------------------
--  DDL for Procedure NUEVO_PRODUCTO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "NUEVO_PRODUCTO" 
(W_NOMBRE IN PRODUCTO.NOMBRE%TYPE,
W_PRECIO IN PRODUCTO.PRECIO%TYPE,
W_STOCK IN PRODUCTO.STOCK%TYPE,
W_VALORACION IN PRODUCTO.VALORACION%TYPE,
W_DEVUELTO IN PRODUCTO.DEVUELTO%TYPE,
W_ESCOMIC IN PRODUCTO.ESCOMIC%TYPE,
W_EDITORIAL IN PRODUCTO.EDITORIAL%TYPE,
W_ISBN IN PRODUCTO.ISBN%TYPE,
W_ESFIGURA IN PRODUCTO.ESFIGURA%TYPE,
W_NUMSERIE IN PRODUCTO.NUMSERIE%TYPE,
W_ESJMESA IN PRODUCTO.ESJMESA%TYPE,
W_NPIEZAS IN PRODUCTO.NPIEZAS%TYPE,
W_ESMERCH IN PRODUCTO.ESMERCH%TYPE,
W_TIPO IN PRODUCTO.TIPO%TYPE) IS
BEGIN
  INSERT INTO PRODUCTO (NOMBRE, PRECIO, STOCK, VALORACION, DEVUELTO, ESCOMIC, EDITORIAL, ISBN, ESFIGURA, NUMSERIE, ESJMESA, NPIEZAS, ESMERCH, TIPO)
  VALUES (W_NOMBRE, W_PRECIO, W_STOCK, W_VALORACION, W_DEVUELTO, W_ESCOMIC, W_EDITORIAL, W_ISBN, W_ESFIGURA, W_NUMSERIE, W_ESJMESA, W_NPIEZAS, W_ESMERCH, W_TIPO);
END NUEVO_PRODUCTO;

/
--------------------------------------------------------
--  DDL for Procedure NUEVO_PROVEEDOR
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "NUEVO_PROVEEDOR" 
(W_CIF IN PROVEEDOR.CIF%TYPE,
W_NOMBRE IN PROVEEDOR.NOMBRE%TYPE,
W_TELEFONO IN PROVEEDOR.TELEFONO%TYPE,
W_DIRECCION IN PROVEEDOR.DIRECCION%TYPE) IS
BEGIN
  INSERT INTO PROVEEDOR (CIF, NOMBRE, TELEFONO, DIRECCION)
  VALUES (W_CIF, W_NOMBRE, W_TELEFONO, W_DIRECCION);
END NUEVO_PROVEEDOR;

/
--------------------------------------------------------
--  DDL for Procedure NUEVO_TICKET
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "NUEVO_TICKET" 
(W_FECHA IN TICKET.FECHA%TYPE,
W_COMENTARIO IN TICKET.COMENTARIO%TYPE,
W_RESUELTO IN TICKET.RESUELTO%TYPE) IS
BEGIN
  INSERT INTO TICKET(FECHA, COMENTARIO, RESUELTO)
  VALUES (W_FECHA, W_COMENTARIO, W_RESUELTO);
END NUEVO_TICKET;

/
--------------------------------------------------------
--  DDL for Procedure NUEVO_USUARIO
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "NUEVO_USUARIO" 
(W_NIF IN USUARIO.NIF%TYPE,
W_NOMBRE IN USUARIO.NOMBRE%TYPE,
W_APELLIDOS IN USUARIO.APELLIDOS%TYPE,
W_EMAIL IN USUARIO.EMAIL%TYPE,
W_TELEFONO IN USUARIO.TELEFONO%TYPE,
W_ESSOCIO IN USUARIO.ESSOCIO%TYPE,
W_DIRECCION IN USUARIO.DIRECCION%TYPE,
W_FECHANACIMIENTO IN USUARIO.FECHANACIMIENTO%TYPE) IS
BEGIN
  INSERT INTO USUARIO (NIF, NOMBRE, APELLIDOS, EMAIL, TELEFONO, ESSOCIO, DIRECCION, FECHANACIMIENTO)
  VALUES (W_NIF, W_NOMBRE, W_APELLIDOS, W_EMAIL, W_TELEFONO, W_ESSOCIO, W_DIRECCION, W_FECHANACIMIENTO);
END NUEVO_USUARIO;

/
--------------------------------------------------------
--  DDL for Package PK_EMPLEADO
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE "PK_EMPLEADO" AS 

PROCEDURE NUEVO_EMPLEADO 
(W_NIF IN EMPLEADO.NIF%TYPE,
W_NOMBRE IN EMPLEADO.NOMBRE%TYPE,
W_APELLIDOS IN EMPLEADO.APELLIDOS%TYPE,
W_TURNO IN EMPLEADO.TURNO%TYPE,
W_SUELDO IN EMPLEADO.SUELDO%TYPE);


PROCEDURE ACTUALIZAR_EMPLEADO 

(W_OID_E IN EMPLEADO.OID_E%TYPE,
W_NIF IN EMPLEADO.NIF%TYPE,
W_NOMBRE IN EMPLEADO.NOMBRE%TYPE,
W_APELLIDOS IN EMPLEADO.APELLIDOS%TYPE,
W_TURNO IN EMPLEADO.TURNO%TYPE,
W_SUELDO IN EMPLEADO.SUELDO%TYPE);

PROCEDURE ELIMINAR_EMPLEADO 
(W_OID_E IN EMPLEADO.OID_E%TYPE);

PROCEDURE INICIALIZAR_EMPLEADO;


END PK_EMPLEADO;

/
--------------------------------------------------------
--  DDL for Package PK_EMPRESATRANSPORTE
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE "PK_EMPRESATRANSPORTE" AS 

  PROCEDURE NUEVA_EMPRESATRANSPORTE
(W_CIF IN EMPRESATRANSPORTE.CIF%TYPE,
W_NOMBRE IN EMPRESATRANSPORTE.NOMBRE%TYPE,
W_TELEFONO IN EMPRESATRANSPORTE.TELEFONO%TYPE,
W_DIRECCION IN EMPRESATRANSPORTE.DIRECCION%TYPE);

PROCEDURE ACTUALIZAR_EMPRESA_TRANSPORTE
(W_OID_ET IN EMPRESATRANSPORTE.OID_ET%TYPE,
W_NOMBRE IN EMPRESATRANSPORTE.NOMBRE%TYPE,
W_TELEFONO IN EMPRESATRANSPORTE.TELEFONO%TYPE,
W_DIRECCION IN EMPRESATRANSPORTE.DIRECCION%TYPE,
W_CIF IN EMPRESAtRANSPORTE.CIF%TYPE);

PROCEDURE ELIMINAR_EMPRESATRANSPORTE 
(W_OID_ET IN EMPRESATRANSPORTE.OID_ET%TYPE);

PROCEDURE INICIALIZAR_EMPRESATRANSPORTE;

END PK_EMPRESATRANSPORTE;

/
--------------------------------------------------------
--  DDL for Package PK_FOTO
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE "PK_FOTO" AS 

  PROCEDURE NUEVA_FOTO
(W_URL IN FOTO.URL%TYPE);

PROCEDURE ACTUALIZAR_FOTO 
(W_OID_FOTO IN FOTO.OID_FOTO%TYPE,
W_URL IN FOTO.URL%TYPE,
W_OID_PR IN FOTO.OID_PR%TYPE);

PROCEDURE ELIMINAR_FOTO
(W_OID_FOTO IN FOTO.OID_FOTO%TYPE);

PROCEDURE INICIALIZAR_FOTO;

END PK_FOTO;

/
--------------------------------------------------------
--  DDL for Package PK_LINEAPEDIDO
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE "PK_LINEAPEDIDO" AS 

  PROCEDURE NUEVA_LINEAPEDIDO
(W_CANTIDAD IN LINEAPEDIDO.CANTIDAD%TYPE,
W_PRECIO IN LINEAPEDIDO.PRECIO%TYPE);

PROCEDURE ACTUALIZAR_LINEAPEDIDO
(W_OID_LP IN LINEAPEDIDO.OID_LP%TYPE,
W_OID_PEDIDO IN LINEAPEDIDO.OID_PEDIDO%TYPE,
W_CANTIDAD IN LINEAPEDIDO.CANTIDAD%TYPE,
W_PRECIO IN LINEAPEDIDO.PRECIO%TYPE,
W_OID_PR IN LINEAPEDIDO.OID_PR%TYPE);

PROCEDURE ELIMINAR_LINEAPEDIDO 
(W_OID_LP IN LINEAPEDIDO.OID_LP%TYPE);

PROCEDURE INICIALIZAR_LINEAPEDIDO;

END PK_LINEAPEDIDO;

/
--------------------------------------------------------
--  DDL for Package PK_PEDIDO
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE "PK_PEDIDO" AS 

  PROCEDURE NUEVO_PEDIDO
(W_ID IN PEDIDO.ID%TYPE,
W_FECHA IN PEDIDO.FECHA%TYPE) ;

PROCEDURE ACTUALIZAR_PEDIDO 
(W_OID_PEDIDO IN PEDIDO.OID_PEDIDO%TYPE,
W_OID_U IN PEDIDO.OID_U%TYPE,
W_OID_ET IN PEDIDO.OID_ET%TYPE,
W_ID IN PEDIDO.ID%TYPE,
W_FECHA IN PEDIDO.FECHA%TYPE);  

PROCEDURE ELIMINAR_PEDIDO
(W_OID_PEDIDO IN PEDIDO.OID_PEDIDO%TYPE);


PROCEDURE INICIALIZAR_PEDIDO;

END PK_PEDIDO;

/
--------------------------------------------------------
--  DDL for Package PK_PRODUCTO
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE "PK_PRODUCTO" AS 

PROCEDURE NUEVO_PRODUCTO 
(W_NOMBRE IN PRODUCTO.NOMBRE%TYPE,
W_PRECIO IN PRODUCTO.PRECIO%TYPE,
W_STOCK IN PRODUCTO.STOCK%TYPE,
W_VALORACION IN PRODUCTO.VALORACION%TYPE,
W_DEVUELTO IN PRODUCTO.DEVUELTO%TYPE,
W_ESCOMIC IN PRODUCTO.ESCOMIC%TYPE,
W_EDITORIAL IN PRODUCTO.EDITORIAL%TYPE,
W_ISBN IN PRODUCTO.ISBN%TYPE,
W_ESFIGURA IN PRODUCTO.ESFIGURA%TYPE,
W_NUMSERIE IN PRODUCTO.NUMSERIE%TYPE,
W_ESJMESA IN PRODUCTO.ESJMESA%TYPE,
W_NPIEZAS IN PRODUCTO.NPIEZAS%TYPE,
W_ESMERCH IN PRODUCTO.ESMERCH%TYPE,
W_TIPO IN PRODUCTO.TIPO%TYPE);

PROCEDURE ACTUALIZAR_PRODUCTO
(W_OID_PR IN PRODUCTO.OID_PR%TYPE,
W_NOMBRE IN PRODUCTO.NOMBRE%TYPE,
W_PRECIO IN PRODUCTO.PRECIO%TYPE,
W_STOCK IN PRODUCTO.STOCK%TYPE,
W_VALORACION IN PRODUCTO.VALORACION%TYPE,
W_DEVUELTO IN PRODUCTO.DEVUELTO%TYPE,
W_ESCOMIC IN PRODUCTO.ESCOMIC%TYPE,
W_EDITORIAL IN PRODUCTO.EDITORIAL%TYPE,
W_ISBN IN PRODUCTO.ISBN%TYPE,
W_ESFIGURA IN PRODUCTO.ESFIGURA%TYPE,
W_NUMSERIE IN PRODUCTO.NUMSERIE%TYPE,
W_ESJMESA IN PRODUCTO.ESJMESA%TYPE,
W_NPIEZAS IN PRODUCTO.NPIEZAS%TYPE,
W_ESMERCH IN PRODUCTO.ESMERCH%TYPE,
W_TIPO IN PRODUCTO.TIPO%TYPE,
W_ID_PRODUCTO IN PRODUCTO.ID_PRODUCTO%TYPE);


PROCEDURE ELIMINAR_PRODUCTO 
(W_OID_PR IN PRODUCTO.OID_PR%TYPE);

PROCEDURE INICIALIZAR_PRODUCTO;

END PK_PRODUCTO;

/
--------------------------------------------------------
--  DDL for Package PK_PROVEEDOR
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE "PK_PROVEEDOR" AS 

  PROCEDURE NUEVO_PROVEEDOR
(W_CIF IN PROVEEDOR.CIF%TYPE,
W_NOMBRE IN PROVEEDOR.NOMBRE%TYPE,
W_TELEFONO IN PROVEEDOR.TELEFONO%TYPE,
W_DIRECCION IN PROVEEDOR.DIRECCION%TYPE);

PROCEDURE ACTUALIZAR_PROVEEDOR
(W_OID_PV IN PROVEEDOR.OID_PV%TYPE,
W_CIF IN PROVEEDOR.CIF%TYPE,
W_NOMBRE IN PROVEEDOR.NOMBRE%TYPE,
W_TELEFONO IN PROVEEDOR.TELEFONO%TYPE,
W_DIRECCION IN PROVEEDOR.DIRECCION%TYPE
);

PROCEDURE ELIMINAR_PROVEEDOR 
(W_OID_PV IN PROVEEDOR.OID_PV%TYPE); 

PROCEDURE INICIALIZAR_PROVEEDOR;

END PK_PROVEEDOR;

/
--------------------------------------------------------
--  DDL for Package PK_RESERVA
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE "PK_RESERVA" AS 

PROCEDURE NUEVA_RESERVA 
(W_FECHA IN RESERVA.FECHA%TYPE,
W_FECHAMAXRECOGIDA IN RESERVA.FECHAMAXRECOGIDA%TYPE,
W_TOTAL IN RESERVA.TOTAL%TYPE,
W_TENTREGADO IN RESERVA.TENTREGADO%TYPE,
W_ID IN RESERVA.ID%TYPE,
W_ESRECOGIDO IN RESERVA.ESRECOGIDO%TYPE);

PROCEDURE ACTUALIZAR_RESERVA
(W_OID_RES IN RESERVA.OID_RES%TYPE,
W_OID_U IN RESERVA.OID_U%TYPE,
W_FECHA IN RESERVA.FECHA%TYPE,
W_FECHAMAXRECOGIDA IN RESERVA.FECHAMAXRECOGIDA%TYPE,
W_TOTAL IN RESERVA.TOTAL%TYPE,
W_TENTREGADO IN RESERVA.TENTREGADO%TYPE,
W_ID IN RESERVA.ID%TYPE,
W_ESRECOGIDO IN RESERVA.ESRECOGIDO%TYPE);

PROCEDURE ELIMINAR_RESERVA
(W_OID_RES IN RESERVA.OID_RES%TYPE);

PROCEDURE INICIALIZAR_RESERVA;

END PK_RESERVA;

/
--------------------------------------------------------
--  DDL for Package PK_TICKET
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE "PK_TICKET" AS 

  PROCEDURE NUEVO_TICKET
(W_FECHA IN TICKET.FECHA%TYPE,
W_COMENTARIO IN TICKET.COMENTARIO%TYPE,
W_RESUELTO IN TICKET.RESUELTO%TYPE);

PROCEDURE ACTUALIZAR_TICKET
(W_OID_TICKET IN TICKET.OID_TICKET%TYPE,
W_OID_U IN TICKET.OID_U%TYPE,
W_OID_E IN TICKET.OID_E%TYPE,
W_FECHA IN TICKET.FECHA%TYPE,
W_COMENTARIO IN TICKET.COMENTARIO%TYPE,
W_RESUELTO IN TICKET.RESUELTO%TYPE);

PROCEDURE ELIMINAR_TICKET
(W_OID_TICKET IN TICKET.OID_TICKET%TYPE);

PROCEDURE INICIALIZAR_TICKET;

END PK_TICKET;

/
--------------------------------------------------------
--  DDL for Package PK_USUARIO
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE "PK_USUARIO" AS 

 PROCEDURE NUEVO_USUARIO 
(W_NIF IN USUARIO.NIF%TYPE,
W_NOMBRE IN USUARIO.NOMBRE%TYPE,
W_APELLIDOS IN USUARIO.APELLIDOS%TYPE,
W_EMAIL IN USUARIO.EMAIL%TYPE,
W_TELEFONO IN USUARIO.TELEFONO%TYPE,
W_ESSOCIO IN USUARIO.ESSOCIO%TYPE,
W_DIRECCION IN USUARIO.DIRECCION%TYPE,
W_FECHANACIMIENTO IN USUARIO.FECHANACIMIENTO%TYPE);

PROCEDURE ACTUALIZAR_USUARIO
(W_OID_U IN USUARIO.OID_U%TYPE,
W_NIF IN USUARIO.NIF%TYPE,
W_NOMBRE IN USUARIO.NOMBRE%TYPE,
W_APELLIDOS IN USUARIO.APELLIDOS%TYPE,
W_EMAIL IN USUARIO.EMAIL%TYPE,
W_TELEFONO IN USUARIO.TELEFONO%TYPE,
W_ESSOCIO IN USUARIO.ESSOCIO%TYPE,
W_DIRECCION IN USUARIO.DIRECCION%TYPE,
W_FECHANACIMIENTO IN USUARIO.FECHANACIMIENTO%TYPE);

PROCEDURE ELIMINAR_USUARIO
(W_OID_U IN USUARIO.OID_U%TYPE);

PROCEDURE INICIALIZAR_USUARIO;

END PK_USUARIO;

/
--------------------------------------------------------
--  DDL for Package PK_VENTA
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE "PK_VENTA" AS 

PROCEDURE NUEVA_VENTA
(W_FECHA IN VENTA.FECHA%TYPE,
W_ID IN VENTA.ID%TYPE);

PROCEDURE ACTUALIZAR_VENTA
(W_OID_VENTA IN VENTA.OID_U%TYPE,
W_OID_U IN VENTA.OID_U%TYPE,
W_FECHA IN VENTA.FECHA%TYPE,
W_ID IN VENTA.ID%TYPE);

PROCEDURE ELIMINAR_VENTA
(W_OID_VENTA IN VENTA.OID_VENTA%TYPE);

PROCEDURE INICIALIZAR_VENTA;

END PK_VENTA;

/
--------------------------------------------------------
--  DDL for Package Body PK_EMPLEADO
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE BODY "PK_EMPLEADO" AS

  PROCEDURE NUEVO_EMPLEADO 
(W_NIF IN EMPLEADO.NIF%TYPE,
W_NOMBRE IN EMPLEADO.NOMBRE%TYPE,
W_APELLIDOS IN EMPLEADO.APELLIDOS%TYPE,
W_TURNO IN EMPLEADO.TURNO%TYPE,
W_SUELDO IN EMPLEADO.SUELDO%TYPE) AS
  BEGIN
     INSERT INTO EMPLEADO(NIF, NOMBRE, APELLIDOS, TURNO, SUELDO)
    VALUES (W_NIF, W_NOMBRE, W_APELLIDOS, W_TURNO, W_SUELDO);
  END NUEVO_EMPLEADO;

  PROCEDURE ACTUALIZAR_EMPLEADO 

(W_OID_E IN EMPLEADO.OID_E%TYPE,
W_NIF IN EMPLEADO.NIF%TYPE,
W_NOMBRE IN EMPLEADO.NOMBRE%TYPE,
W_APELLIDOS IN EMPLEADO.APELLIDOS%TYPE,
W_TURNO IN EMPLEADO.TURNO%TYPE,
W_SUELDO IN EMPLEADO.SUELDO%TYPE) AS
  BEGIN
    UPDATE EMPLEADO SET NIF = W_NIF WHERE OID_E = W_OID_E;
    UPDATE EMPLEADO SET NOMBRE = W_NOMBRE WHERE OID_E = W_OID_E;
    UPDATE EMPLEADO SET APELLIDOS = W_APELLIDOS WHERE OID_E = W_OID_E;
    UPDATE EMPLEADO SET TURNO = W_TURNO WHERE OID_E = W_OID_E;
    UPDATE EMPLEADO SET SUELDO = W_SUELDO WHERE OID_E = W_OID_E;
  END ACTUALIZAR_EMPLEADO;

  PROCEDURE ELIMINAR_EMPLEADO 
(W_OID_E IN EMPLEADO.OID_E%TYPE) AS
  BEGIN
    DELETE FROM EMPLEADO WHERE OID_E = W_OID_E;
  END ELIMINAR_EMPLEADO;

  PROCEDURE INICIALIZAR_EMPLEADO AS
  BEGIN
    DELETE FROM EMPLEADO;
  END INICIALIZAR_EMPLEADO;

END PK_EMPLEADO;

/
--------------------------------------------------------
--  DDL for Package Body PK_EMPRESATRANSPORTE
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE BODY "PK_EMPRESATRANSPORTE" AS

  PROCEDURE NUEVA_EMPRESATRANSPORTE
(W_CIF IN EMPRESATRANSPORTE.CIF%TYPE,
W_NOMBRE IN EMPRESATRANSPORTE.NOMBRE%TYPE,
W_TELEFONO IN EMPRESATRANSPORTE.TELEFONO%TYPE,
W_DIRECCION IN EMPRESATRANSPORTE.DIRECCION%TYPE) AS
  BEGIN
   INSERT INTO EMPRESATRANSPORTE(CIF, NOMBRE, TELEFONO, DIRECCION)
  VALUES (W_CIF, W_NOMBRE, W_TELEFONO, W_DIRECCION);
  END NUEVA_EMPRESATRANSPORTE;

  PROCEDURE ACTUALIZAR_EMPRESA_TRANSPORTE
(W_OID_ET IN EMPRESATRANSPORTE.OID_ET%TYPE,
W_NOMBRE IN EMPRESATRANSPORTE.NOMBRE%TYPE,
W_TELEFONO IN EMPRESATRANSPORTE.TELEFONO%TYPE,
W_DIRECCION IN EMPRESATRANSPORTE.DIRECCION%TYPE,
W_CIF IN EMPRESAtRANSPORTE.CIF%TYPE) AS
  BEGIN
    UPDATE EMPRESATRANSPORTE SET NOMBRE = W_NOMBRE WHERE OID_ET = W_OID_ET;
    UPDATE EMPRESATRANSPORTE SET TELEFONO = W_TELEFONO WHERE OID_ET = W_OID_ET;
    UPDATE EMPRESATRANSPORTE SET CIF = W_CIF WHERE OID_ET = W_OID_ET;
    UPDATE EMPRESATRANSPORTE SET CIF = W_CIF WHERE OID_ET = W_OID_ET;
  END ACTUALIZAR_EMPRESA_TRANSPORTE;

  PROCEDURE ELIMINAR_EMPRESATRANSPORTE 
(W_OID_ET IN EMPRESATRANSPORTE.OID_ET%TYPE) AS
  BEGIN
    DELETE FROM EMPRESATRANSPORTE WHERE OID_ET = W_OID_ET;
  END ELIMINAR_EMPRESATRANSPORTE;

  PROCEDURE INICIALIZAR_EMPRESATRANSPORTE AS
  BEGIN
    DELETE FROM empresatransporte;
  END INICIALIZAR_EMPRESATRANSPORTE;

END PK_EMPRESATRANSPORTE;

/
--------------------------------------------------------
--  DDL for Package Body PK_FOTO
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE BODY "PK_FOTO" AS

  PROCEDURE NUEVA_FOTO
(W_URL IN FOTO.URL%TYPE) AS
  BEGIN
    INSERT INTO FOTO(URL)
  VALUES(W_URL);
  END NUEVA_FOTO;

  PROCEDURE ACTUALIZAR_FOTO 
(W_OID_FOTO IN FOTO.OID_FOTO%TYPE,
W_URL IN FOTO.URL%TYPE,
W_OID_PR IN FOTO.OID_PR%TYPE) AS
  BEGIN
   UPDATE FOTO SET URL = W_URL WHERE OID_FOTO = W_OID_FOTO;
  END ACTUALIZAR_FOTO;

  PROCEDURE ELIMINAR_FOTO
(W_OID_FOTO IN FOTO.OID_FOTO%TYPE) AS
  BEGIN
    DELETE FROM FOTO WHERE OID_FOTO = W_OID_FOTO;
  END ELIMINAR_FOTO;

  PROCEDURE INICIALIZAR_FOTO AS
  BEGIN
    DELETE FROM FOTO;
  END INICIALIZAR_FOTO;

END PK_FOTO;

/
--------------------------------------------------------
--  DDL for Package Body PK_LINEAPEDIDO
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE BODY "PK_LINEAPEDIDO" AS

  PROCEDURE NUEVA_LINEAPEDIDO
(W_CANTIDAD IN LINEAPEDIDO.CANTIDAD%TYPE,
W_PRECIO IN LINEAPEDIDO.PRECIO%TYPE) AS
  BEGIN
    INSERT INTO LINEAPEDIDO(CANTIDAD, PRECIO)
  VALUES (W_CANTIDAD, W_PRECIO);
  END NUEVA_LINEAPEDIDO;

  PROCEDURE ACTUALIZAR_LINEAPEDIDO
(W_OID_LP IN LINEAPEDIDO.OID_LP%TYPE,
W_OID_PEDIDO IN LINEAPEDIDO.OID_PEDIDO%TYPE,
W_CANTIDAD IN LINEAPEDIDO.CANTIDAD%TYPE,
W_PRECIO IN LINEAPEDIDO.PRECIO%TYPE,
W_OID_PR IN LINEAPEDIDO.OID_PR%TYPE) AS
  BEGIN
    UPDATE LINEAPEDIDO SET CANTIDAD = W_CANTIDAD WHERE OID_LP = W_OID_LP;
  UPDATE LINEAPEDIDO SET PRECIO = W_PRECIO WHERE OID_LP = W_OID_LP;
  END ACTUALIZAR_LINEAPEDIDO;

  PROCEDURE ELIMINAR_LINEAPEDIDO 
(W_OID_LP IN LINEAPEDIDO.OID_LP%TYPE) AS
  BEGIN
    DELETE FROM LINEAPEDIDO WHERE OID_LP = W_OID_LP;
  END ELIMINAR_LINEAPEDIDO;

  PROCEDURE INICIALIZAR_LINEAPEDIDO AS
  BEGIN
    DELETE FROM LINEAPEDIDO;
  END INICIALIZAR_LINEAPEDIDO;

END PK_LINEAPEDIDO;

/
--------------------------------------------------------
--  DDL for Package Body PK_PEDIDO
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE BODY "PK_PEDIDO" AS

  PROCEDURE NUEVO_PEDIDO
(W_ID IN PEDIDO.ID%TYPE,
W_FECHA IN PEDIDO.FECHA%TYPE)  AS
  BEGIN
   INSERT INTO PEDIDO (ID, FECHA)
  VALUES (W_ID, W_FECHA);
  END NUEVO_PEDIDO;

  PROCEDURE ACTUALIZAR_PEDIDO 
(W_OID_PEDIDO IN PEDIDO.OID_PEDIDO%TYPE,
W_OID_U IN PEDIDO.OID_U%TYPE,
W_OID_ET IN PEDIDO.OID_ET%TYPE,
W_ID IN PEDIDO.ID%TYPE,
W_FECHA IN PEDIDO.FECHA%TYPE) AS
  BEGIN
   UPDATE PEDIDO SET ID = W_ID WHERE OID_PEDIDO = W_OID_PEDIDO;
  UPDATE PEDIDO SET FECHA = W_FECHA WHERE OID_PEDIDO = W_OID_PEDIDO;
  END ACTUALIZAR_PEDIDO;

  PROCEDURE ELIMINAR_PEDIDO
(W_OID_PEDIDO IN PEDIDO.OID_PEDIDO%TYPE) AS
  BEGIN
    DELETE FROM PEDIDO WHERE OID_PEDIDO = W_OID_PEDIDO;
  END ELIMINAR_PEDIDO;

  PROCEDURE INICIALIZAR_PEDIDO AS
  BEGIN
    DELETE FROM PEDIDO;
  END INICIALIZAR_PEDIDO;

END PK_PEDIDO;

/
--------------------------------------------------------
--  DDL for Package Body PK_PRODUCTO
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE BODY "PK_PRODUCTO" AS

  PROCEDURE NUEVO_PRODUCTO 
(W_NOMBRE IN PRODUCTO.NOMBRE%TYPE,
W_PRECIO IN PRODUCTO.PRECIO%TYPE,
W_STOCK IN PRODUCTO.STOCK%TYPE,
W_VALORACION IN PRODUCTO.VALORACION%TYPE,
W_DEVUELTO IN PRODUCTO.DEVUELTO%TYPE,
W_ESCOMIC IN PRODUCTO.ESCOMIC%TYPE,
W_EDITORIAL IN PRODUCTO.EDITORIAL%TYPE,
W_ISBN IN PRODUCTO.ISBN%TYPE,
W_ESFIGURA IN PRODUCTO.ESFIGURA%TYPE,
W_NUMSERIE IN PRODUCTO.NUMSERIE%TYPE,
W_ESJMESA IN PRODUCTO.ESJMESA%TYPE,
W_NPIEZAS IN PRODUCTO.NPIEZAS%TYPE,
W_ESMERCH IN PRODUCTO.ESMERCH%TYPE,
W_TIPO IN PRODUCTO.TIPO%TYPE) AS
  BEGIN
   INSERT INTO PRODUCTO (NOMBRE, PRECIO, STOCK, VALORACION, DEVUELTO, ESCOMIC, EDITORIAL, ISBN, ESFIGURA, NUMSERIE, ESJMESA, NPIEZAS, ESMERCH, TIPO)
  VALUES (W_NOMBRE, W_PRECIO, W_STOCK, W_VALORACION, W_DEVUELTO, W_ESCOMIC, W_EDITORIAL, W_ISBN, W_ESFIGURA, W_NUMSERIE, W_ESJMESA, W_NPIEZAS, W_ESMERCH, W_TIPO);
  END NUEVO_PRODUCTO;

  PROCEDURE ACTUALIZAR_PRODUCTO
(W_OID_PR IN PRODUCTO.OID_PR%TYPE,
W_NOMBRE IN PRODUCTO.NOMBRE%TYPE,
W_PRECIO IN PRODUCTO.PRECIO%TYPE,
W_STOCK IN PRODUCTO.STOCK%TYPE,
W_VALORACION IN PRODUCTO.VALORACION%TYPE,
W_DEVUELTO IN PRODUCTO.DEVUELTO%TYPE,
W_ESCOMIC IN PRODUCTO.ESCOMIC%TYPE,
W_EDITORIAL IN PRODUCTO.EDITORIAL%TYPE,
W_ISBN IN PRODUCTO.ISBN%TYPE,
W_ESFIGURA IN PRODUCTO.ESFIGURA%TYPE,
W_NUMSERIE IN PRODUCTO.NUMSERIE%TYPE,
W_ESJMESA IN PRODUCTO.ESJMESA%TYPE,
W_NPIEZAS IN PRODUCTO.NPIEZAS%TYPE,
W_ESMERCH IN PRODUCTO.ESMERCH%TYPE,
W_TIPO IN PRODUCTO.TIPO%TYPE,
W_ID_PRODUCTO IN PRODUCTO.ID_PRODUCTO%TYPE) AS
  BEGIN
    UPDATE PRODUCTO SET NOMBRE = W_NOMBRE WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET PRECIO = W_PRECIO WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET STOCK = W_STOCK WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET VALORACION = W_VALORACION WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET DEVUELTO = W_DEVUELTO WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET ESCOMIC = W_ESCOMIC WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET EDITORIAL= W_EDITORIAL WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET ISBN = W_ESFIGURA WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET ESFIGURA = W_ESFIGURA WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET NUMSERIE = W_NUMSERIE WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET ESJMESA = W_ESJMESA WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET NPIEZAS = W_NPIEZAS WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET ESMERCH = W_ESMERCH WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET TIPO = W_TIPO WHERE OID_PR = W_OID_PR;
    UPDATE PRODUCTO SET ID_PRODUCTO = W_ID_PRODUCTO WHERE OID_PR = W_OID_PR;
  END ACTUALIZAR_PRODUCTO;

  PROCEDURE ELIMINAR_PRODUCTO 
(W_OID_PR IN PRODUCTO.OID_PR%TYPE) AS
  BEGIN
    DELETE FROM PRODUCTO WHERE OID_PR = W_OID_PR;
  END ELIMINAR_PRODUCTO;

  PROCEDURE INICIALIZAR_PRODUCTO AS
  BEGIN
    DELETE FROM PRODUCTO;
  END INICIALIZAR_PRODUCTO;

END PK_PRODUCTO;

/
--------------------------------------------------------
--  DDL for Package Body PK_PROVEEDOR
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE BODY "PK_PROVEEDOR" AS

  PROCEDURE NUEVO_PROVEEDOR
(W_CIF IN PROVEEDOR.CIF%TYPE,
W_NOMBRE IN PROVEEDOR.NOMBRE%TYPE,
W_TELEFONO IN PROVEEDOR.TELEFONO%TYPE,
W_DIRECCION IN PROVEEDOR.DIRECCION%TYPE) AS
  BEGIN
    INSERT INTO PROVEEDOR (CIF, NOMBRE, TELEFONO, DIRECCION)
  VALUES (W_CIF, W_NOMBRE, W_TELEFONO, W_DIRECCION);
  END NUEVO_PROVEEDOR;

  PROCEDURE ACTUALIZAR_PROVEEDOR
(W_OID_PV IN PROVEEDOR.OID_PV%TYPE,
W_CIF IN PROVEEDOR.CIF%TYPE,
W_NOMBRE IN PROVEEDOR.NOMBRE%TYPE,
W_TELEFONO IN PROVEEDOR.TELEFONO%TYPE,
W_DIRECCION IN PROVEEDOR.DIRECCION%TYPE
) AS
  BEGIN
    UPDATE PROVEEDOR SET CIF = W_CIF WHERE OID_PV = W_OID_PV;
  UPDATE PROVEEDOR SET NOMBRE = W_NOMBRE WHERE OID_PV = W_OID_PV;
  UPDATE PROVEEDOR SET TELEFONO = W_TELEFONO WHERE OID_PV = W_OID_PV;
  UPDATE PROVEEDOR SET DIRECCION = W_DIRECCION WHERE OID_PV = W_OID_PV;
  END ACTUALIZAR_PROVEEDOR;

  PROCEDURE ELIMINAR_PROVEEDOR 
(W_OID_PV IN PROVEEDOR.OID_PV%TYPE) AS
  BEGIN
    DELETE FROM PROVEEDOR WHERE OID_PV = W_OID_PV;
  END ELIMINAR_PROVEEDOR;

  PROCEDURE INICIALIZAR_PROVEEDOR AS
  BEGIN
    DELETE FROM PROVEEDOR;
  END INICIALIZAR_PROVEEDOR;

END PK_PROVEEDOR;

/
--------------------------------------------------------
--  DDL for Package Body PK_RESERVA
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE BODY "PK_RESERVA" AS

  PROCEDURE NUEVA_RESERVA 
(W_FECHA IN RESERVA.FECHA%TYPE,
W_FECHAMAXRECOGIDA IN RESERVA.FECHAMAXRECOGIDA%TYPE,
W_TOTAL IN RESERVA.TOTAL%TYPE,
W_TENTREGADO IN RESERVA.TENTREGADO%TYPE,
W_ID IN RESERVA.ID%TYPE,
W_ESRECOGIDO IN RESERVA.ESRECOGIDO%TYPE) AS
  BEGIN
   INSERT INTO RESERVA (FECHA, FECHAMAXRECOGIDA, TOTAL, TENTREGADO, ID, ESRECOGIDO)
  VALUES (W_FECHA, W_FECHAMAXRECOGIDA, W_TOTAL, W_TENTREGADO, W_ID, W_ESRECOGIDO);
  END NUEVA_RESERVA;

  PROCEDURE ACTUALIZAR_RESERVA
(W_OID_RES IN RESERVA.OID_RES%TYPE,
W_OID_U IN RESERVA.OID_U%TYPE,
W_FECHA IN RESERVA.FECHA%TYPE,
W_FECHAMAXRECOGIDA IN RESERVA.FECHAMAXRECOGIDA%TYPE,
W_TOTAL IN RESERVA.TOTAL%TYPE,
W_TENTREGADO IN RESERVA.TENTREGADO%TYPE,
W_ID IN RESERVA.ID%TYPE,
W_ESRECOGIDO IN RESERVA.ESRECOGIDO%TYPE) AS
  BEGIN
    UPDATE RESERVA SET FECHA = W_FECHA WHERE OID_RES = W_OID_RES;
  UPDATE RESERVA SET FECHAMAXRECOGIDA = W_FECHAMAXRECOGIDA WHERE OID_RES = W_OID_RES;
  UPDATE RESERVA SET TOTAL = W_TOTAL WHERE OID_RES = W_OID_RES;
  UPDATE RESERVA SET TENTREGADO = W_TENTREGADO WHERE OID_RES = W_OID_RES;
  UPDATE RESERVA SET ID = W_ID WHERE OID_RES = W_OID_RES;
  UPDATE RESERVA SET ESRECOGIDO = W_ESRECOGIDO WHERE OID_RES = W_OID_RES;
  END ACTUALIZAR_RESERVA;

  PROCEDURE ELIMINAR_RESERVA
(W_OID_RES IN RESERVA.OID_RES%TYPE) AS
  BEGIN
    DELETE FROM RESERVA WHERE OID_RES = W_OID_RES;
  END ELIMINAR_RESERVA;

  PROCEDURE INICIALIZAR_RESERVA AS
  BEGIN
    DELETE FROM RESERVA;
  END INICIALIZAR_RESERVA;

END PK_RESERVA;

/
--------------------------------------------------------
--  DDL for Package Body PK_TICKET
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE BODY "PK_TICKET" AS

  PROCEDURE NUEVO_TICKET
(W_FECHA IN TICKET.FECHA%TYPE,
W_COMENTARIO IN TICKET.COMENTARIO%TYPE,
W_RESUELTO IN TICKET.RESUELTO%TYPE) AS
  BEGIN
   INSERT INTO TICKET(FECHA, COMENTARIO, RESUELTO)
  VALUES (W_FECHA, W_COMENTARIO, W_RESUELTO);
  END NUEVO_TICKET;

  PROCEDURE ACTUALIZAR_TICKET
(W_OID_TICKET IN TICKET.OID_TICKET%TYPE,
W_OID_U IN TICKET.OID_U%TYPE,
W_OID_E IN TICKET.OID_E%TYPE,
W_FECHA IN TICKET.FECHA%TYPE,
W_COMENTARIO IN TICKET.COMENTARIO%TYPE,
W_RESUELTO IN TICKET.RESUELTO%TYPE) AS
  BEGIN
    UPDATE TICKET SET FECHA = W_FECHA WHERE OID_TICKET = W_OID_TICKET;
  UPDATE TICKET SET COMENTARIO = W_COMENTARIO WHERE OID_TICKET = W_OID_TICKET;
  UPDATE TICKET SET RESUELTO = W_RESUELTO WHERE OID_TICKET = W_OID_TICKET;
  END ACTUALIZAR_TICKET;

  PROCEDURE ELIMINAR_TICKET
(W_OID_TICKET IN TICKET.OID_TICKET%TYPE) AS
  BEGIN
    DELETE FROM TICKET WHERE OID_TICKET = W_OID_TICKET;
  END ELIMINAR_TICKET;

  PROCEDURE INICIALIZAR_TICKET AS
  BEGIN
      DELETE FROM TICKET;

  END INICIALIZAR_TICKET;

END PK_TICKET;

/
--------------------------------------------------------
--  DDL for Package Body PK_USUARIO
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE BODY "PK_USUARIO" AS

  PROCEDURE NUEVO_USUARIO 
(W_NIF IN USUARIO.NIF%TYPE,
W_NOMBRE IN USUARIO.NOMBRE%TYPE,
W_APELLIDOS IN USUARIO.APELLIDOS%TYPE,
W_EMAIL IN USUARIO.EMAIL%TYPE,
W_TELEFONO IN USUARIO.TELEFONO%TYPE,
W_ESSOCIO IN USUARIO.ESSOCIO%TYPE,
W_DIRECCION IN USUARIO.DIRECCION%TYPE,
W_FECHANACIMIENTO IN USUARIO.FECHANACIMIENTO%TYPE) AS
  BEGIN
    INSERT INTO USUARIO (NIF, NOMBRE, APELLIDOS, EMAIL, TELEFONO, ESSOCIO, DIRECCION, FECHANACIMIENTO)
  VALUES (W_NIF, W_NOMBRE, W_APELLIDOS, W_EMAIL, W_TELEFONO, W_ESSOCIO, W_DIRECCION, W_FECHANACIMIENTO);
  END NUEVO_USUARIO;

  PROCEDURE ACTUALIZAR_USUARIO
(W_OID_U IN USUARIO.OID_U%TYPE,
W_NIF IN USUARIO.NIF%TYPE,
W_NOMBRE IN USUARIO.NOMBRE%TYPE,
W_APELLIDOS IN USUARIO.APELLIDOS%TYPE,
W_EMAIL IN USUARIO.EMAIL%TYPE,
W_TELEFONO IN USUARIO.TELEFONO%TYPE,
W_ESSOCIO IN USUARIO.ESSOCIO%TYPE,
W_DIRECCION IN USUARIO.DIRECCION%TYPE,
W_FECHANACIMIENTO IN USUARIO.FECHANACIMIENTO%TYPE) AS
  BEGIN
    UPDATE USUARIO SET NIF = W_NIF WHERE OID_U = W_OID_U;
  UPDATE USUARIO SET NOMBRE = W_NOMBRE WHERE OID_U = W_OID_U;
  UPDATE USUARIO SET APELLIDOS= W_APELLIDOS WHERE OID_U = W_OID_U;
  UPDATE USUARIO SET EMAIL = W_EMAIL WHERE OID_U = W_OID_U;
  UPDATE USUARIO SET TELEFONO = W_TELEFONO WHERE OID_U = W_OID_U;
  UPDATE USUARIO SET ESSOCIO = W_ESSOCIO WHERE OID_U = W_OID_U;
  UPDATE USUARIO SET DIRECCION= W_DIRECCION WHERE OID_U = W_OID_U;
  UPDATE USUARIO SET FECHANACIMIENTO = W_FECHANACIMIENTO WHERE OID_U = W_OID_U;
  END ACTUALIZAR_USUARIO;

  PROCEDURE ELIMINAR_USUARIO
(W_OID_U IN USUARIO.OID_U%TYPE) AS
  BEGIN
    DELETE FROM USUARIO WHERE OID_U = W_OID_U;
  END ELIMINAR_USUARIO;

  PROCEDURE INICIALIZAR_USUARIO AS
  BEGIN
    DELETE FROM USUARIO;
  END INICIALIZAR_USUARIO;

END PK_USUARIO;

/
--------------------------------------------------------
--  DDL for Package Body PK_VENTA
--------------------------------------------------------

  CREATE OR REPLACE PACKAGE BODY "PK_VENTA" AS

  PROCEDURE NUEVA_VENTA
(W_FECHA IN VENTA.FECHA%TYPE,
W_ID IN VENTA.ID%TYPE) AS
  BEGIN
    INSERT INTO VENTA (FECHA, ID)
  VALUES (W_FECHA, W_ID);
  END NUEVA_VENTA;

  PROCEDURE ACTUALIZAR_VENTA
(W_OID_VENTA IN VENTA.OID_U%TYPE,
W_OID_U IN VENTA.OID_U%TYPE,
W_FECHA IN VENTA.FECHA%TYPE,
W_ID IN VENTA.ID%TYPE) AS
  BEGIN
    UPDATE VENTA SET FECHA = W_FECHA WHERE OID_VENTA = W_OID_VENTA;
  UPDATE VENTA SET ID = W_ID WHERE OID_VENTA = W_OID_VENTA;
  END ACTUALIZAR_VENTA;

  PROCEDURE ELIMINAR_VENTA
(W_OID_VENTA IN VENTA.OID_VENTA%TYPE) AS
  BEGIN
    DELETE FROM VENTA WHERE OID_VENTA = W_OID_VENTA;
  END ELIMINAR_VENTA;

  PROCEDURE INICIALIZAR_VENTA AS
  BEGIN
    DELETE FROM VENTA;
  END INICIALIZAR_VENTA;

END PK_VENTA;

/
--------------------------------------------------------
--  DDL for Function ASSERT_EQUALS
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "ASSERT_EQUALS" (salida BOOLEAN, salidaEsperada BOOLEAN) RETURN VARCHAR2 AS
BEGIN
  IF (salida = salida_esperada) THEN
    RETURN 'EXITO';
  ELSE
    RETURN 'FALLO';
  END IF;
END ASSERT_EQUALS;

/
--------------------------------------------------------
--  Constraints for Table PEDIDO
--------------------------------------------------------

  ALTER TABLE "PEDIDO" MODIFY ("OID_ET" NOT NULL ENABLE);
  ALTER TABLE "PEDIDO" MODIFY ("ID" NOT NULL ENABLE);
  ALTER TABLE "PEDIDO" ADD CONSTRAINT "PK_PEDIDO" PRIMARY KEY ("OID_PEDIDO") ENABLE;
  ALTER TABLE "PEDIDO" MODIFY ("OID_U" NOT NULL ENABLE);
  ALTER TABLE "PEDIDO" MODIFY ("FECHA" NOT NULL ENABLE);
  ALTER TABLE "PEDIDO" MODIFY ("OID_PEDIDO" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table TICKET
--------------------------------------------------------

  ALTER TABLE "TICKET" MODIFY ("EMAIL" NOT NULL ENABLE);
  ALTER TABLE "TICKET" MODIFY ("NOMBRE" NOT NULL ENABLE);
  ALTER TABLE "TICKET" ADD CONSTRAINT "CK_TICKET_RESUELTO" CHECK (Resuelto IN(0,1)) ENABLE;
  ALTER TABLE "TICKET" ADD CONSTRAINT "PK_TICKET" PRIMARY KEY ("OID_TICKET") ENABLE;
  ALTER TABLE "TICKET" MODIFY ("RESUELTO" NOT NULL ENABLE);
  ALTER TABLE "TICKET" MODIFY ("OID_E" NOT NULL ENABLE);
  ALTER TABLE "TICKET" MODIFY ("OID_U" NOT NULL ENABLE);
  ALTER TABLE "TICKET" MODIFY ("COMENTARIO" NOT NULL ENABLE);
  ALTER TABLE "TICKET" MODIFY ("FECHA" NOT NULL ENABLE);
  ALTER TABLE "TICKET" MODIFY ("OID_TICKET" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table USUARIO
--------------------------------------------------------

  ALTER TABLE "USUARIO" MODIFY ("CONTRASEÑA" NOT NULL ENABLE);
  ALTER TABLE "USUARIO" ADD CONSTRAINT "CK_USUARIO_SOCIO" CHECK (esSocio IN(0,1)) ENABLE;
  ALTER TABLE "USUARIO" ADD CONSTRAINT "CK_USUARIO_EMAIL" CHECK (LENGTH(Email) - LENGTH(replace(Email,'@','')) = 1) ENABLE;
  ALTER TABLE "USUARIO" ADD CONSTRAINT "CK_USUARIO_NIF" CHECK (REGEXP_LIKE(nif, '[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][A-Z]')) ENABLE;
  ALTER TABLE "USUARIO" ADD CONSTRAINT "AK_USUARIO_NIF" UNIQUE ("NIF") ENABLE;
  ALTER TABLE "USUARIO" ADD CONSTRAINT "PK_USUARIO" PRIMARY KEY ("OID_U") ENABLE;
  ALTER TABLE "USUARIO" MODIFY ("EDAD" NOT NULL ENABLE);
  ALTER TABLE "USUARIO" MODIFY ("ESSOCIO" NOT NULL ENABLE);
  ALTER TABLE "USUARIO" MODIFY ("TELEFONO" NOT NULL ENABLE);
  ALTER TABLE "USUARIO" MODIFY ("EMAIL" NOT NULL ENABLE);
  ALTER TABLE "USUARIO" MODIFY ("APELLIDOS" NOT NULL ENABLE);
  ALTER TABLE "USUARIO" MODIFY ("NOMBRE" NOT NULL ENABLE);
  ALTER TABLE "USUARIO" MODIFY ("NIF" NOT NULL ENABLE);
  ALTER TABLE "USUARIO" MODIFY ("OID_U" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table FOTO
--------------------------------------------------------

  ALTER TABLE "FOTO" MODIFY ("OID_PR" NOT NULL ENABLE);
  ALTER TABLE "FOTO" ADD CONSTRAINT "PK_FOTO" PRIMARY KEY ("OID_FOTO") ENABLE;
  ALTER TABLE "FOTO" MODIFY ("URL" NOT NULL ENABLE);
  ALTER TABLE "FOTO" MODIFY ("OID_FOTO" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table RESERVA
--------------------------------------------------------

  ALTER TABLE "RESERVA" ADD CONSTRAINT "CK_RESERVA_ESRECOGIDO" CHECK (esRecogido = 0 OR esRecogido = 1) ENABLE;
  ALTER TABLE "RESERVA" ADD CONSTRAINT "CK_RESERVA_TENTREGADO" CHECK (tEntregado = (10/100)*Total) ENABLE;
  ALTER TABLE "RESERVA" ADD CONSTRAINT "CK_RESERVA_TOTAL" CHECK (Total > 0) ENABLE;
  ALTER TABLE "RESERVA" ADD CONSTRAINT "CK_RESERVA_FECHA" CHECK (TO_DATE(Fecha, 'DD/MM/YYYY') < TO_DATE(fechaMaxRecogida, 'DD/MM/YYYY')) ENABLE;
  ALTER TABLE "RESERVA" ADD CONSTRAINT "PK_RESERVA" PRIMARY KEY ("OID_RES") ENABLE;
  ALTER TABLE "RESERVA" MODIFY ("ESRECOGIDO" NOT NULL ENABLE);
  ALTER TABLE "RESERVA" MODIFY ("ID" NOT NULL ENABLE);
  ALTER TABLE "RESERVA" MODIFY ("OID_U" NOT NULL ENABLE);
  ALTER TABLE "RESERVA" MODIFY ("TENTREGADO" NOT NULL ENABLE);
  ALTER TABLE "RESERVA" MODIFY ("TOTAL" NOT NULL ENABLE);
  ALTER TABLE "RESERVA" MODIFY ("FECHAMAXRECOGIDA" NOT NULL ENABLE);
  ALTER TABLE "RESERVA" MODIFY ("FECHA" NOT NULL ENABLE);
  ALTER TABLE "RESERVA" MODIFY ("OID_RES" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table PRODUCTO
--------------------------------------------------------

  ALTER TABLE "PRODUCTO" ADD CONSTRAINT "CK_PRODUCTO_DEVUELTO" CHECK (Devuelto IN(0,1)) ENABLE;
  ALTER TABLE "PRODUCTO" ADD CONSTRAINT "CK_PRODUCTO_ESMERCH" CHECK (esMerch IN(0,1)) ENABLE;
  ALTER TABLE "PRODUCTO" ADD CONSTRAINT "CK_PRODUCTO_JMESA" CHECK (esJMesa IN(0,1)) ENABLE;
  ALTER TABLE "PRODUCTO" ADD CONSTRAINT "CK_PRODUCTO_FIGURA" CHECK (esFigura IN(0,1)) ENABLE;
  ALTER TABLE "PRODUCTO" ADD CONSTRAINT "CK_PRODUCTO_COMIC" CHECK (esComic IN(0,1)) ENABLE;
  ALTER TABLE "PRODUCTO" ADD CONSTRAINT "CK_PRODUCTO_VALORACION" CHECK (REGEXP_LIKE(Valoracion,'[0-5]')) ENABLE;
  ALTER TABLE "PRODUCTO" ADD CONSTRAINT "CK_PRODUCTO_STOCK" CHECK (Stock > 0) ENABLE;
  ALTER TABLE "PRODUCTO" ADD CONSTRAINT "CK_PRODUCTO_PRECIO" CHECK (Precio > 0.0) ENABLE;
  ALTER TABLE "PRODUCTO" ADD CONSTRAINT "AK_PRODUCTO_NOMBRE" UNIQUE ("NOMBRE") ENABLE;
  ALTER TABLE "PRODUCTO" ADD CONSTRAINT "PK_PRODUCTO" PRIMARY KEY ("OID_PR") ENABLE;
  ALTER TABLE "PRODUCTO" MODIFY ("ESMERCH" NOT NULL ENABLE);
  ALTER TABLE "PRODUCTO" MODIFY ("ESJMESA" NOT NULL ENABLE);
  ALTER TABLE "PRODUCTO" MODIFY ("ESFIGURA" NOT NULL ENABLE);
  ALTER TABLE "PRODUCTO" MODIFY ("ESCOMIC" NOT NULL ENABLE);
  ALTER TABLE "PRODUCTO" MODIFY ("DEVUELTO" NOT NULL ENABLE);
  ALTER TABLE "PRODUCTO" MODIFY ("VALORACION" NOT NULL ENABLE);
  ALTER TABLE "PRODUCTO" MODIFY ("STOCK" NOT NULL ENABLE);
  ALTER TABLE "PRODUCTO" MODIFY ("PRECIO" NOT NULL ENABLE);
  ALTER TABLE "PRODUCTO" MODIFY ("NOMBRE" NOT NULL ENABLE);
  ALTER TABLE "PRODUCTO" MODIFY ("OID_PR" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table LINEAPEDIDO
--------------------------------------------------------

  ALTER TABLE "LINEAPEDIDO" MODIFY ("ID" NOT NULL ENABLE);
  ALTER TABLE "LINEAPEDIDO" ADD CONSTRAINT "CK_LINEAPEDIDO_PRECIO" CHECK (Precio > 0.0) ENABLE;
  ALTER TABLE "LINEAPEDIDO" ADD CONSTRAINT "CK_LINEAPEDIDO_CANTIDAD" CHECK (Cantidad >= 1) ENABLE;
  ALTER TABLE "LINEAPEDIDO" MODIFY ("OID_PR" NOT NULL ENABLE);
  ALTER TABLE "LINEAPEDIDO" ADD CONSTRAINT "PK_LINEAPEDIDO" PRIMARY KEY ("OID_LP") ENABLE;
  ALTER TABLE "LINEAPEDIDO" MODIFY ("OID_PEDIDO" NOT NULL ENABLE);
  ALTER TABLE "LINEAPEDIDO" MODIFY ("PRECIO" NOT NULL ENABLE);
  ALTER TABLE "LINEAPEDIDO" MODIFY ("CANTIDAD" NOT NULL ENABLE);
  ALTER TABLE "LINEAPEDIDO" MODIFY ("OID_LP" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table EMPLEADO
--------------------------------------------------------

  ALTER TABLE "EMPLEADO" ADD CONSTRAINT "CK_EMPLEADO_NIF" CHECK (REGEXP_LIKE(nif, '[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][A-Z]')) ENABLE;
  ALTER TABLE "EMPLEADO" ADD CONSTRAINT "CK_EMPLEADO_SUELDO" CHECK (Sueldo > 0.0) ENABLE;
  ALTER TABLE "EMPLEADO" ADD CONSTRAINT "AK_EMPLEADO_NIF" UNIQUE ("NIF") ENABLE;
  ALTER TABLE "EMPLEADO" ADD CONSTRAINT "PK_EMPLEADO" PRIMARY KEY ("OID_E") ENABLE;
  ALTER TABLE "EMPLEADO" MODIFY ("ID" NOT NULL ENABLE);
  ALTER TABLE "EMPLEADO" MODIFY ("SUELDO" NOT NULL ENABLE);
  ALTER TABLE "EMPLEADO" MODIFY ("TURNO" NOT NULL ENABLE);
  ALTER TABLE "EMPLEADO" MODIFY ("NIF" NOT NULL ENABLE);
  ALTER TABLE "EMPLEADO" MODIFY ("APELLIDOS" NOT NULL ENABLE);
  ALTER TABLE "EMPLEADO" MODIFY ("NOMBRE" NOT NULL ENABLE);
  ALTER TABLE "EMPLEADO" MODIFY ("OID_E" NOT NULL ENABLE);
  ALTER TABLE "EMPLEADO" ADD CHECK (Turno IN('M','T','P') ) ENABLE;
--------------------------------------------------------
--  Constraints for Table VENTA
--------------------------------------------------------

  ALTER TABLE "VENTA" ADD CONSTRAINT "CK_VENTA_ID" CHECK (REGEXP_LIKE(ID, '[0-9][0-9][0-9][0-9][0-9][0-9]')) ENABLE;
  ALTER TABLE "VENTA" ADD CONSTRAINT "PK_VENTA" PRIMARY KEY ("OID_VENTA") ENABLE;
  ALTER TABLE "VENTA" MODIFY ("OID_U" NOT NULL ENABLE);
  ALTER TABLE "VENTA" MODIFY ("ID" NOT NULL ENABLE);
  ALTER TABLE "VENTA" MODIFY ("FECHA" NOT NULL ENABLE);
  ALTER TABLE "VENTA" MODIFY ("OID_VENTA" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table PROVEEDOR
--------------------------------------------------------

  ALTER TABLE "PROVEEDOR" ADD CONSTRAINT "AK_PROVEEDOR_NOMBRE" UNIQUE ("NOMBRE") ENABLE;
  ALTER TABLE "PROVEEDOR" ADD CONSTRAINT "PROVEEDOR_PK" PRIMARY KEY ("OID_PV") ENABLE;
  ALTER TABLE "PROVEEDOR" ADD CONSTRAINT "CK_PROVEEDOR_TELEFONO" CHECK (REGEXP_LIKE(Telefono, '[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]')) ENABLE;
  ALTER TABLE "PROVEEDOR" ADD CONSTRAINT "CK_PROVEEDOR_CIF" CHECK (REGEXP_LIKE(cif, '[A-W][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9, A-Z]')) ENABLE;
  ALTER TABLE "PROVEEDOR" MODIFY ("DIRECCION" NOT NULL ENABLE);
  ALTER TABLE "PROVEEDOR" MODIFY ("TELEFONO" NOT NULL ENABLE);
  ALTER TABLE "PROVEEDOR" MODIFY ("NOMBRE" NOT NULL ENABLE);
  ALTER TABLE "PROVEEDOR" MODIFY ("CIF" NOT NULL ENABLE);
--------------------------------------------------------
--  Ref Constraints for Table LINEAPEDIDO
--------------------------------------------------------

  ALTER TABLE "LINEAPEDIDO" ADD CONSTRAINT "FK_LP_PEDIDO" FOREIGN KEY ("OID_PEDIDO") REFERENCES "PEDIDO" ("OID_PEDIDO") ON DELETE CASCADE ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table PEDIDO
--------------------------------------------------------

  ALTER TABLE "PEDIDO" ADD CONSTRAINT "FK_PEDIDO_USUARIO" FOREIGN KEY ("OID_U") REFERENCES "USUARIO" ("OID_U") ON DELETE CASCADE ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table RESERVA
--------------------------------------------------------

  ALTER TABLE "RESERVA" ADD CONSTRAINT "FK_RESERVA_PRODUCTO" FOREIGN KEY ("ID") REFERENCES "PRODUCTO" ("OID_PR") ON DELETE CASCADE ENABLE;
  ALTER TABLE "RESERVA" ADD CONSTRAINT "FK_RESERVA_USUARIO" FOREIGN KEY ("OID_U") REFERENCES "USUARIO" ("OID_U") ON DELETE CASCADE ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table TICKET
--------------------------------------------------------

  ALTER TABLE "TICKET" ADD CONSTRAINT "FK_TICKET_EMPLEADO" FOREIGN KEY ("OID_E") REFERENCES "EMPLEADO" ("OID_E") ON DELETE CASCADE ENABLE;
  ALTER TABLE "TICKET" ADD CONSTRAINT "FK_TICKET_USUARIO" FOREIGN KEY ("OID_U") REFERENCES "USUARIO" ("OID_U") ON DELETE CASCADE ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table VENTA
--------------------------------------------------------

  ALTER TABLE "VENTA" ADD CONSTRAINT "FK_VENTA_PRODUCTO" FOREIGN KEY ("ID") REFERENCES "PRODUCTO" ("OID_PR") ON DELETE CASCADE ENABLE;
  ALTER TABLE "VENTA" ADD CONSTRAINT "FK_VENTA_USUARIO" FOREIGN KEY ("OID_U") REFERENCES "USUARIO" ("OID_U") ON DELETE CASCADE ENABLE;
