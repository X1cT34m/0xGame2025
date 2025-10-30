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

/* flex-objects/types/default/configure.html.twig */
class __TwigTemplate_94daa80393fde161799961687fd033867c3a9078516e0a9dbb6de4f1ef9fed57 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $_trait_0 = $this->loadTemplate("flex-objects/types/default/titlebar/configure.html.twig", "flex-objects/types/default/configure.html.twig", 2);
        // line 2
        if (!$_trait_0->isTraitable()) {
            throw new RuntimeError('Template "'."flex-objects/types/default/titlebar/configure.html.twig".'" cannot be used as a trait.', 2, $this->getSourceContext());
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            [
                'body' => [$this, 'block_body'],
                'content_top' => [$this, 'block_content_top'],
                'topbar' => [$this, 'block_topbar'],
                'content' => [$this, 'block_content'],
                'edit' => [$this, 'block_edit'],
                'bottom' => [$this, 'block_bottom'],
            ]
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "partials/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 4
        $context["name"] = $this->getAttribute(($context["view_config"] ?? null), "form", [], "array");
        // line 5
        $context["form"] = (($context["form"]) ?? ($this->getAttribute(($context["directory"] ?? null), "directoryForm", [0 => ($context["name"] ?? null)], "method")));
        // line 8
        $context["can_save"] = (($context["can_save"]) ?? ($this->getAttribute(($context["user"] ?? null), "authorize", [0 => ((($this->getAttribute(($context["view_config"] ?? null), "authorize", [], "array", true, true) &&  !(null === $this->getAttribute(($context["view_config"] ?? null), "authorize", [], "array")))) ? ($this->getAttribute(($context["view_config"] ?? null), "authorize", [], "array")) : ("admin.super"))], "method")));
        // line 11
        $context["allowed"] = (($context["allowed"]) ?? (((($context["directory"] ?? null) && ($context["form"] ?? null)) && ($context["can_save"] ?? null))));
        // line 12
        $context["back_route"] = (($context["back_route"]) ?? (("/" . $this->getAttribute(($context["route"] ?? null), "getRoute", [0 => 1], "method"))));
        // line 13
        $context["title_icon"] = (($context["title_icon"]) ?? (((($this->getAttribute(($context["view_config"] ?? null), "icon", [], "array", true, true) &&  !(null === $this->getAttribute(($context["view_config"] ?? null), "icon", [], "array")))) ? ($this->getAttribute(($context["view_config"] ?? null), "icon", [], "array")) : ("fa-cog"))));
        // line 14
        ob_start();
        // line 15
        $context["title_config"] = ((($this->getAttribute(($context["view_config"] ?? null), "title", [], "array", true, true) &&  !(null === $this->getAttribute(($context["view_config"] ?? null), "title", [], "array")))) ? ($this->getAttribute(($context["view_config"] ?? null), "title", [], "array")) : (null));
        // line 16
        if ($this->getAttribute(($context["title_config"] ?? null), "template", [])) {
            // line 17
            echo twig_include($this->env, $context, twig_template_from_string($this->env, $this->getAttribute(($context["title_config"] ?? null), "template", []), "configure title template"));
        } else {
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter($this->getAttribute(($context["directory"] ?? null), "title", [])), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.CONFIGURATION"), "html", null, true);
        }
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 26
        $context["macro"] = $this;
        // line 1
        $this->parent = $this->loadTemplate("partials/base.html.twig", "flex-objects/types/default/configure.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_body($context, array $blocks = [])
    {
        // line 29
        echo "    ";
        $context["back_url"] = (($context["back_url"]) ?? ($this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc(($context["back_route"] ?? null))));
        // line 30
        echo "
    ";
        // line 31
        $this->displayParentBlock("body", $context, $blocks);
        echo "
";
    }

    // line 34
    public function block_content_top($context, array $blocks = [])
    {
        // line 35
        echo "    ";
        if ((($context["allowed"] ?? null) && $this->getAttribute(($context["user"] ?? null), "authorize", [0 => "admin.super"], "method"))) {
            // line 36
            echo "        ";
            $context["save_location"] = $this->getAttribute(($context["directory"] ?? null), "getDirectoryConfigUri", [0 => ($context["name"] ?? null)], "method");
            // line 37
            echo "        <div class=\"alert notice\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.SAVE_LOCATION"), "html", null, true);
            echo ": <b>";
            echo twig_escape_filter($this->env, twig_trim_filter($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->urlFunc(($context["save_location"] ?? null), false, true), "/"), "html", null, true);
            echo "</b></div>
    ";
        }
    }

    // line 41
    public function block_topbar($context, array $blocks = [])
    {
        // line 42
        echo "    ";
        if ($this->getAttribute(($context["user"] ?? null), "authorize", [0 => "admin.super"], "method")) {
            // line 43
            echo "    <form id=\"admin-mode-toggle\">
        ";
            // line 44
            $context["normalText"] = $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.NORMAL");
            // line 45
            echo "        ";
            $context["expertText"] = $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.EXPERT");
            // line 46
            echo "        ";
            $context["maxLen"] = max([0 => twig_length_filter($this->env, ($context["normalText"] ?? null)), 1 => twig_length_filter($this->env, ($context["expertText"] ?? null))]);
            // line 47
            echo "        ";
            $context["normalText"] = $context["macro"]->getspanToggle(($context["normalText"] ?? null), ($context["maxLen"] ?? null));
            // line 48
            echo "        ";
            $context["expertText"] = $context["macro"]->getspanToggle(($context["expertText"] ?? null), ($context["maxLen"] ?? null));
            // line 49
            echo "
        <div class=\"switch-toggle switch-grav\">
            <input type=\"radio\" value=\"normal\" data-leave-url=\"";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["route"] ?? null), "withGravParam", [0 => "mode", 1 => "normal"], "method"), "toString", [0 => true], "method"), "html", null, true);
            echo "\" id=\"normal\" name=\"mode-switch\" class=\"highlight\" ";
            if (($this->getAttribute($this->getAttribute(($context["admin"] ?? null), "session", []), "expert", []) == "0")) {
                echo " checked=\"checked\"";
            }
            echo ">
            <label for=\"normal\">";
            // line 52
            echo ($context["normalText"] ?? null);
            echo "</label>
            <input type=\"radio\" value=\"expert\" data-leave-url=\"";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["route"] ?? null), "withGravParam", [0 => "mode", 1 => "expert"], "method"), "toString", [0 => true], "method"), "html", null, true);
            echo "\" id=\"expert\" name=\"mode-switch\" class=\"highlight\" ";
            if (($this->getAttribute($this->getAttribute(($context["admin"] ?? null), "session", []), "expert", []) == "1")) {
                echo " checked=\"checked\"";
            }
            echo ">
            <label for=\"expert\">";
            // line 54
            echo ($context["expertText"] ?? null);
            echo "</label>
            <a></a>
        </div>
    </form>
    ";
        }
    }

    // line 61
    public function block_content($context, array $blocks = [])
    {
        // line 62
        echo "    ";
        $this->displayParentBlock("content", $context, $blocks);
        echo "

    ";
        // line 64
        if (($context["allowed"] ?? null)) {
            // line 65
            echo "        <div class=\"clear directory admin-flex-config\">
            <div class=\"admin-form-wrapper\">
                ";
            // line 72
            echo "                ";
            $this->displayBlock('edit', $context, $blocks);
            // line 75
            echo "            </div>
        </div>

        ";
            // line 78
            $this->loadTemplate("partials/modal-changes-detected.html.twig", "flex-objects/types/default/configure.html.twig", 78)->display($context);
            // line 79
            echo "
    ";
        } else {
            // line 81
            echo "
        ";
            // line 82
            $this->getAttribute(($context["page"] ?? null), "modifyHeader", [0 => "http_response_code", 1 => 404], "method");
            // line 83
            echo "        <div class=\"error-block\">
            <h1>";
            // line 84
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.ERROR"), "html", null, true);
            echo " 404</h1>
            <div class=\"padding\">
                <p>
                    ";
            // line 87
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_FLEX_OBJECTS.ERROR.PAGE_NOT_EXIST"), "html", null, true);
            echo "
                </p>
            </div>
        </div>

    ";
        }
    }

    // line 72
    public function block_edit($context, array $blocks = [])
    {
        // line 73
        echo "                    ";
        $this->loadTemplate("partials/blueprints.html.twig", "flex-objects/types/default/configure.html.twig", 73)->display(twig_array_merge($context, ["form" => ($context["form"] ?? null), "data" => $this->getAttribute(($context["form"] ?? null), "data", [])]));
        // line 74
        echo "                ";
    }

    // line 95
    public function block_bottom($context, array $blocks = [])
    {
        // line 96
        echo "    ";
        $this->displayParentBlock("bottom", $context, $blocks);
        echo "

    ";
    }

    // line 23
    public function getspanToggle($__input__ = null, $__length__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "input" => $__input__,
            "length" => $__length__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 24
            echo "    ";
            echo (($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->repeatFunc("&nbsp;&nbsp;", ((($context["length"] ?? null) - twig_length_filter($this->env, ($context["input"] ?? null))) / 2)) . ($context["input"] ?? null)) . $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->repeatFunc("&nbsp;&nbsp;", ((($context["length"] ?? null) - twig_length_filter($this->env, ($context["input"] ?? null))) / 2)));
            echo "
";
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "flex-objects/types/default/configure.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  265 => 24,  252 => 23,  244 => 96,  241 => 95,  237 => 74,  234 => 73,  231 => 72,  220 => 87,  214 => 84,  211 => 83,  209 => 82,  206 => 81,  202 => 79,  200 => 78,  195 => 75,  192 => 72,  188 => 65,  186 => 64,  180 => 62,  177 => 61,  167 => 54,  159 => 53,  155 => 52,  147 => 51,  143 => 49,  140 => 48,  137 => 47,  134 => 46,  131 => 45,  129 => 44,  126 => 43,  123 => 42,  120 => 41,  110 => 37,  107 => 36,  104 => 35,  101 => 34,  95 => 31,  92 => 30,  89 => 29,  86 => 28,  81 => 1,  79 => 26,  73 => 19,  70 => 17,  68 => 16,  66 => 15,  64 => 14,  62 => 13,  60 => 12,  58 => 11,  56 => 8,  54 => 5,  52 => 4,  46 => 1,  23 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'partials/base.html.twig' %}
{% use 'flex-objects/types/default/titlebar/configure.html.twig' %}

{% set name = view_config['form'] %}
{% set form = form ?? directory.directoryForm(name) %}

{# Allowed actions #}
{% set can_save = can_save ?? user.authorize(view_config['authorize'] ?? 'admin.super') %}

{# These variables can be overridden from the main template file #}
{% set allowed = allowed ?? (directory and form and can_save) %}
{% set back_route = back_route ?? ('/' ~ route.getRoute(1)) %}
{% set title_icon = title_icon ?? view_config['icon'] ?? 'fa-cog' %}
{% set title -%}
    {%- set title_config = view_config['title'] ?? null -%}
    {%- if title_config.template -%}
        {{- include(template_from_string(title_config.template, 'configure title template')) -}}
    {%- else -%}
        {{- directory.title|tu }} - {{ 'PLUGIN_ADMIN.CONFIGURATION'|tu -}}
    {% endif %}
{%- endset %}

{% macro spanToggle(input, length) %}
    {{ (repeat('&nbsp;&nbsp;', (length - input|length) / 2) ~ input ~ repeat('&nbsp;&nbsp;', (length - input|length) / 2))|raw }}
{% endmacro %}
{% import _self as macro %}

{% block body %}
    {% set back_url = back_url ?? admin_route(back_route) %}

    {{ parent() }}
{% endblock body %}

{% block content_top %}
    {% if allowed and user.authorize('admin.super') %}
        {% set save_location = directory.getDirectoryConfigUri(name) %}
        <div class=\"alert notice\">{{ \"PLUGIN_ADMIN.SAVE_LOCATION\"|tu }}: <b>{{ url(save_location, false, true)|trim('/') }}</b></div>
    {% endif %}
{% endblock %}

{% block topbar %}
    {% if user.authorize('admin.super') %}
    <form id=\"admin-mode-toggle\">
        {% set normalText = 'PLUGIN_ADMIN.NORMAL'|tu %}
        {% set expertText = 'PLUGIN_ADMIN.EXPERT'|tu %}
        {% set maxLen = max([normalText|length, expertText|length]) %}
        {% set normalText = macro.spanToggle(normalText, maxLen) %}
        {% set expertText = macro.spanToggle(expertText, maxLen) %}

        <div class=\"switch-toggle switch-grav\">
            <input type=\"radio\" value=\"normal\" data-leave-url=\"{{ route.withGravParam('mode', 'normal').toString(true) }}\" id=\"normal\" name=\"mode-switch\" class=\"highlight\" {% if admin.session.expert == '0' %} checked=\"checked\"{% endif %}>
            <label for=\"normal\">{{ normalText|raw }}</label>
            <input type=\"radio\" value=\"expert\" data-leave-url=\"{{ route.withGravParam('mode', 'expert').toString(true) }}\" id=\"expert\" name=\"mode-switch\" class=\"highlight\" {% if admin.session.expert == '1' %} checked=\"checked\"{% endif %}>
            <label for=\"expert\">{{ expertText|raw }}</label>
            <a></a>
        </div>
    </form>
    {% endif %}
{% endblock topbar %}

{% block content %}
    {{ parent() }}

    {% if allowed %}
        <div class=\"clear directory admin-flex-config\">
            <div class=\"admin-form-wrapper\">
                {# TODO: RAW MODE
                <div id=\"admin-topbar\">
                    {{ block('topbar') }}
                </div>
                #}
                {% block edit %}
                    {% include 'partials/blueprints.html.twig' with { form: form, data: form.data } %}
                {% endblock %}
            </div>
        </div>

        {% include 'partials/modal-changes-detected.html.twig' %}

    {% else %}

        {% do page.modifyHeader('http_response_code', 404) %}
        <div class=\"error-block\">
            <h1>{{ 'PLUGIN_ADMIN.ERROR'|tu }} 404</h1>
            <div class=\"padding\">
                <p>
                    {{ 'PLUGIN_FLEX_OBJECTS.ERROR.PAGE_NOT_EXIST'|tu }}
                </p>
            </div>
        </div>

    {% endif %}
{% endblock %}

{% block bottom %}
    {{ parent() }}

    {# TODO: RAW MODE
    <script>
        \$('.admin-flex-config .form-tabs .tabs-nav').css('margin-right', (\$('#admin-topbar').width() + 20) + 'px');
    </script>
    #}
{% endblock bottom %}
", "flex-objects/types/default/configure.html.twig", "/var/www/html/user/plugins/flex-objects/admin/templates/flex-objects/types/default/configure.html.twig");
    }
}
