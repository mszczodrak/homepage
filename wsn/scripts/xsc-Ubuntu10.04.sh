#!/bin/bash
# Author: Marcin Szczodrak
# Date:  May 28, 2010

mkdir WORKSPACE_DIR
ORG_DIR=`pwd` &&
cd WORKSPACE_DIR &&

wget http://ge.archive.ubuntu.com/ubuntu/pool/universe/g/gcc-3.4/cpp-3.4_3.4.6-8ubuntu2_i386.deb &&
wget http://ge.archive.ubuntu.com/ubuntu/pool/universe/g/gcc-3.4/gcc-3.4_3.4.6-8ubuntu2_i386.deb &&
wget http://ge.archive.ubuntu.com/ubuntu/pool/universe/g/gcc-3.4/gcc-3.4-base_3.4.6-8ubuntu2_i386.deb &&

dpkg -i cpp-3.4_3.4.6-8ubuntu2_i386.deb &&
dpkg -i gcc-3.4-base_3.4.6-8ubuntu2_i386.deb &&
dpkg -i gcc-3.4_3.4.6-8ubuntu2_i386.deb &&
dpkg -i cpp-3.4_3.4.6-8ubuntu2_i386.deb &&
rm /usr/bin/gcc &&
ln -s /usr/bin/gcc-3.4 /usr/bin/gcc &&

BINUTILS="binutils-2.19" &&
GCC="gcc-3.4.4" &&
NEWLIB="newlib-1.17.0" &&

apt-get install -y --assume-yes build-essential texinfo &&

wget http://ftp.gnu.org/gnu/binutils/$BINUTILS.tar.bz2  &&
wget ftp://ftp.gnu.org/gnu/gcc/$GCC/$GCC.tar.bz2 &&
wget ftp://sources.redhat.com/pub/newlib/$NEWLIB.tar.gz &&

bunzip2 $BINUTILS.tar.bz2 &&
tar -xvf $BINUTILS.tar &&
bunzip2 $GCC.tar.bz2 &&
tar -xvf $GCC.tar &&
gunzip $NEWLIB.tar.gz &&
tar -xvf $NEWLIB.tar &&

export TARGET=xscale-elf &&
export PREFIX=/usr/local &&
export PATH=${PREFIX}/bin:${PATH} &&

mkdir build-binutils &&
mkdir build-gcc &&
mkdir build-newlib &&

cd build-binutils &&
../$BINUTILS/configure --target=$TARGET --prefix=$PREFIX &&
make &&
make install &&

cd ../build-gcc &&
../$GCC/configure --target=$TARGET --prefix=$PREFIX --with-newlib --without-headers --with-gnu-as --with-gnu-ld --disable-shared --enable-languages=c &&
make &&
make install &&

cd ../build-newlib &&
../$NEWLIB/configure --target=$TARGET --prefix=$PREFIX &&
make &&
sudo make install &&

cd .. &&
sudo rm -rf ./build-gcc/* &&
cd ./build-gcc &&
../$GCC/configure --target=$TARGET --prefix=$PREFIX --with-newlib --without-headers --with-gnu-as --with-gnu-ld --disable-shared --enable-languages=c &&
make &&
sudo make all install &&

cd $ORG_DIR &&
rm -rf WORKSPACE_DIR

