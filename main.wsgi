#flaskapp.wsgi
import sys
sys.path.insert(0, '/var/www/html/ecovid')
 
from main import app as application