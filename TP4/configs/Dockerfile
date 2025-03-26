FROM ubuntu/bind9

RUN mkdir -p /etc/bind/zone

COPY configFiles/named.conf /etc/bind/named.conf
COPY configFiles/l2-4.zone /etc/bind/zone/l2-4.zone

RUN apt-get update && apt-get -y install nano && \
    chown -R bind:bind /etc/bind/zone && \
    chmod -R 770 /etc/bind/zone 

CMD ["/usr/sbin/named", "-g", "-c", "/etc/bind/named.conf", "-u", "bind"]
