user=$(whoami)
#option to docker-compose
#services:
#  db:
#    container_name: mysql_v5.7.42
#    image: mysql:5.7.42
#    restart: unless-stopped
#    ports:
#      - '33060:3306'    
#    volumes:
#      - db:/var/lib/mysql
#      - ./db_script/grantprivilege.sql:/docker-entrypoint-initdb.d      #<- error
#Set up the repository
#Add Docker’s official GPG key
#install -m 0755 -d /etc/apt/keyrings
#curl -fsSL https://download.docker.com/linux/ubuntu/gpg | gpg --dearmor -o /etc/apt/keyrings/docker.gpg
#chmod a+r /etc/apt/keyrings/docker.gpg
#echo \
# "deb [arch="$(dpkg --print-architecture)" signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu \
# "$(. /etc/os-release && echo "$VERSION_CODENAME")" stable" | \
# tee /etc/apt/sources.list.d/docker.list > /dev/null
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | apt-key add -
add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
#Install Docker Engine
apt-get update
apt-get install -y \
   ca-certificates \
   curl \
   gnupg \
   apt-transport-https \
   software-properties-common
apt-get install -y docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
systemctl enable docker.service
systemctl enable containerd.service
usermod -aG docker tringuyen
chmod 666 /var/run/docker.sock
#systemctl status docker.service
#docker compose up -d