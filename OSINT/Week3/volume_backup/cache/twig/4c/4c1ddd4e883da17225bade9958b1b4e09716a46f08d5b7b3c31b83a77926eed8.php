<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* partials/javascript-config.html.twig */
class __TwigTemplate_d7bacd6c75f388d8eb4d2f0bd2dcfed7951425b66f43b11f3318ed8cd651a531 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        if (($this->getAttribute(($context["user"] ?? null), "authorized", []) && $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->authorize([0 => "admin.login", 1 => "admin.super"]))) {
            // line 2
            $context["feed_enabled"] = (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "notifications", []), "feed", []) === true) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "notifications", []), "feed", []) == "true"));
            // line 3
            $context["dashboard_enabled"] = (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "notifications", []), "dashboard", []) === true) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "notifications", []), "dashboard", []) == "true"));
            // line 4
            $context["plugins_enabled"] = (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "notifications", []), "plugins", []) === true) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "notifications", []), "plugins", []) == "true"));
            // line 5
            $context["themes_enabled"] = (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "notifications", []), "themes", []) === true) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "notifications", []), "themes", []) == "true"));
            // line 6
            $context["notifications"] = (((((($context["feed_enabled"] ?? null) || ($context["dashboard_enabled"] ?? null)) || ($context["plugins_enabled"] ?? null)) || ($context["themes_enabled"] ?? null))) ? (1) : (0));
            // line 7
            echo "
";
            // line 8
            switch (($context["template_route"] ?? null)) {
                case "dashboard":
                {
                    // line 10
                    echo "        ";
                    $context["notifications_filters"] = "['feed', 'dashboard', 'top']";
                    // line 11
                    echo "    ";
                    break;
                }
                case "plugins":
                {
                    // line 12
                    echo "        ";
                    $context["notifications_filters"] = "['plugins', 'top']";
                    // line 13
                    echo "    ";
                    break;
                }
                case "themes":
                {
                    // line 14
                    echo "        ";
                    $context["notifications_filters"] = "['themes', 'top']";
                    // line 15
                    echo "    ";
                    break;
                }
                default:
                {
                    // line 16
                    echo "        ";
                    $context["notifications_filters"] = "['top']";
                }
            }
            // line 18
            echo "<script type=\"text/javascript\">
    window.GravAdmin = window.GravAdmin || {};
    window.GravAdmin.config = {
        current_url: '";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["uri"] ?? null), "getCurrentRoute", [], "method"), "withLanguage", [0 => $this->getAttribute($this->getAttribute(($context["grav"] ?? null), "language", []), "active", [])], "method"), "withExtension", [0 => ""], "method"), "withoutParams", [], "method"), "toString", [0 => true], "method"), "html", null, true);
            echo "',
        base_url_relative: '";
            // line 22
            echo twig_escape_filter($this->env, ($context["base_url_relative"] ?? null), "html", null, true);
            echo "',
        base_url_simple: '";
            // line 23
            echo twig_escape_filter($this->env, ($context["base_url_simple"] ?? null), "html", null, true);
            echo "',
        route: '";
            // line 24
            echo twig_escape_filter($this->env, twig_trim_filter($this->getAttribute(($context["admin"] ?? null), "route", []), "/"), "html", null, true);
            echo "',
        param_sep: '";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["config"] ?? null), "system", []), "param_sep", []), "html", null, true);
            echo "',
        ";
            // line 26
            if ($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->authorize([0 => "admin.maintenance", 1 => "admin.super"])) {
                // line 27
                echo "        enable_auto_updates_check: '";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "enable_auto_updates_check", []), "html", null, true);
                echo "',
        ";
            }
            // line 29
            echo "        admin_timeout: '";
            (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "session", []), "timeout", [])) ? (print (twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "session", []), "timeout", []), "html", null, true))) : (print (1800)));
            echo "',
        admin_nonce: '";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute(($context["admin"] ?? null), "getNonce", []), "html", null, true);
            echo "',
        language: '";
            // line 31
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "user", [], "any", false, true), "language", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "user", [], "any", false, true), "language", []), "en")) : ("en")), "html", null, true);
            echo "',
        pro_enabled: '";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin-pro", [], "array"), "enabled", []), "html", null, true);
            echo "',
        notifications: {
            enabled: ";
            // line 34
            echo twig_escape_filter($this->env, ($context["notifications"] ?? null), "html", null, true);
            echo ",
            filters: ";
            // line 35
            echo ($context["notifications_filters"] ?? null);
            echo "
        },
        local_notifications: '";
            // line 37
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["config"] ?? null), "system", [], "any", false, true), "local_notifications", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["config"] ?? null), "system", [], "any", false, true), "local_notifications", []), false)) : (false)), "html", null, true);
            echo "',
        site: {
            delimiter: '";
            // line 39
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "site", [], "any", false, true), "summary", [], "any", false, true), "delimiter", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "site", [], "any", false, true), "summary", [], "any", false, true), "delimiter", []), "===")) : ("===")), "html", null, true);
            echo "'
        }
    };
    window.GravAdmin.uri_params = {};

    ";
            // line 44
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "uri", []), "params", [0 => null, 1 => true], "method"));
            foreach ($context['_seq'] as $context["param"] => $context["value"]) {
                // line 45
                echo "        window.GravAdmin.uri_params[";
                echo twig_jsonencode_filter($context["param"]);
                echo "] = \"";
                echo twig_escape_filter($this->env, twig_replace_filter($context["value"], ["\\" => "/"]), "html", null, true);
                echo "\";
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['param'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 47
            echo "</script>
";
        }
    }

    public function getTemplateName()
    {
        return "partials/javascript-config.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  169 => 47,  158 => 45,  154 => 44,  146 => 39,  141 => 37,  136 => 35,  132 => 34,  127 => 32,  123 => 31,  119 => 30,  114 => 29,  108 => 27,  106 => 26,  102 => 25,  98 => 24,  94 => 23,  90 => 22,  86 => 21,  81 => 18,  76 => 16,  70 => 15,  67 => 14,  61 => 13,  58 => 12,  52 => 11,  49 => 10,  45 => 8,  42 => 7,  40 => 6,  38 => 5,  36 => 4,  34 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% if user.authorized and authorize(['admin.login', 'admin.super']) %}
{% set feed_enabled = config.plugins.admin.notifications.feed is same as(true) or config.plugins.admin.notifications.feed == 'true' %}
{% set dashboard_enabled = config.plugins.admin.notifications.dashboard is same as(true) or config.plugins.admin.notifications.dashboard == 'true' %}
{% set plugins_enabled = config.plugins.admin.notifications.plugins is same as(true) or config.plugins.admin.notifications.plugins == 'true' %}
{% set themes_enabled = config.plugins.admin.notifications.themes is same as(true) or config.plugins.admin.notifications.themes == 'true' %}
{% set notifications = (feed_enabled or dashboard_enabled or plugins_enabled or themes_enabled) ? 1 : 0 %}

{% switch template_route %}
    {% case 'dashboard' %}
        {% set notifications_filters = \"['feed', 'dashboard', 'top']\" %}
    {% case 'plugins' %}
        {% set notifications_filters = \"['plugins', 'top']\" %}
    {% case 'themes' %}
        {% set notifications_filters = \"['themes', 'top']\" %}
    {% default %}
        {% set notifications_filters = \"['top']\" %}
{% endswitch %}
<script type=\"text/javascript\">
    window.GravAdmin = window.GravAdmin || {};
    window.GravAdmin.config = {
        current_url: '{{ uri.getCurrentRoute().withLanguage(grav.language.active).withExtension('').withoutParams().toString(true) }}',
        base_url_relative: '{{ base_url_relative }}',
        base_url_simple: '{{ base_url_simple }}',
        route: '{{ admin.route|trim('/') }}',
        param_sep: '{{ config.system.param_sep }}',
        {% if authorize(['admin.maintenance', 'admin.super']) %}
        enable_auto_updates_check: '{{ config.plugins.admin.enable_auto_updates_check }}',
        {% endif %}
        admin_timeout: '{{ config.plugins.admin.session.timeout ?: 1800 }}',
        admin_nonce: '{{ admin.getNonce }}',
        language: '{{ grav.user.language|default('en') }}',
        pro_enabled: '{{ config.plugins[\"admin-pro\"].enabled }}',
        notifications: {
            enabled: {{ notifications }},
            filters: {{ notifications_filters|raw }}
        },
        local_notifications: '{{ config.system.local_notifications|default(false) }}',
        site: {
            delimiter: '{{ config.site.summary.delimiter|default('===') }}'
        }
    };
    window.GravAdmin.uri_params = {};

    {% for param, value in grav.uri.params(null, true) %}
        window.GravAdmin.uri_params[{{ param|json_encode|raw }}] = \"{{value|replace({'\\\\': '/'})}}\";
    {% endfor %}
</script>
{% endif %}
", "partials/javascript-config.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/partials/javascript-config.html.twig");
    }
}
